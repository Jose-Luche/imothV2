<?php

namespace App\Http\Controllers\Front;

use App\Models\Payment;
use App\Models\Attachment;
use Illuminate\Http\Request;
use App\Models\InsuranceCompany;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\User\IndustrialAttachment;
use Illuminate\Support\Facades\Session;
use App\Models\PersonalAccidentApplication;
use App\Mail\Admin\AdminIndustrialAttachment;
use App\Mail\Front\NewApplicationUserDetailsMail;

class AttachmentController extends Controller
{
    public function index()
    {
        return view('front.attachment.index');
    }

    public function submit(Request $request)
    {
        $messages = [
            'phoneNumber.min' => 'Please enter your phone number in the format 25471234567'
        ];
        $validator = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'phoneNumber' => 'required',
            'email' => 'email|required',
            'startDate' => 'required|date',
            'duration' => 'required',

        ], $messages);


        //Create the user here and store the reference id.
        $create = PersonalAccidentApplication::create([
            'firstName' => $request->input('firstName'),
            'lastName' => $request->input('lastName'),
            'phone' => $request->input('phoneNumber'),
            'email' => $request->input('email'),
            'startDate' => $request->input('startDate'),
            'duration' => $request->input('duration'),
            'companyName' => $request->institution,
            'idNumber' => $request->idNumber,
            'amount_payable' => 0,
            'insurance_id' => 0,
            'type' => 1
        ]);

        if (!$create) {
            return  back()->with('error', 'An unexpected error occurred.Please try again.');
        }

        //Mail::to(env('ADMIN_NOTIF_MAIL'))->send(new NewApplicationUserDetailsMail($create));

        $request->session()->put('firstName', $request->input('firstName'));
        $request->session()->put('lastName', $request->input('lastName'));
        $request->session()->put('phoneNumber', $request->input('phoneNumber'));
        $request->session()->put('email', $request->input('email'));
        $request->session()->put('startDate', $request->input('startDate'));
        $request->session()->put('duration', $request->input('duration'));
        $request->session()->put('companyName', $request->input('companyName'));
        $request->session()->put('companyName', 1);

        $request->session()->put('applicationId', $create->id);

        return redirect()->route('front.attachment.quotes');
    }

    public function quotes()
    {
        $duration = \Illuminate\Support\Facades\Session::get('duration');
        $applicationId = \Illuminate\Support\Facades\Session::get('applicationId');

        if ($duration == 3) {
            $type = 'three_month';
        } elseif ($duration == 6) {
            $type = 'six_month';
        } else {
            $type = 'one_year';
        }

        $covers = Attachment::get();

        return view('front.attachment.quotes', ['covers' => $covers, 'duration' => $type, 'applicationId'=>$applicationId]);
    }

    public function quoteDetails($id)
    {


        $total = 0;
        $details = Attachment::findorfail($id);
        /**Since we have the Duration Session Period Details, get the Premium Payable**/
        $duration = \Illuminate\Support\Facades\Session::get('duration');
        $applicationId = \Illuminate\Support\Facades\Session::get('applicationId');

        $applicationDetails = PersonalAccidentApplication::where('id', $applicationId)->first();
        if ($duration == 3) {
            $total = $details->three_month;
        } elseif ($duration == 6) {
            $total = $details->six_month;
        } else {
            $total = $details->one_year;
        }

        $html = ' <p>Total Premium Payable:  <span style="float: right"><b>' . number_format($total, 2) . '</b></span></p>';

        Mail::to(env('ADMIN_NOTIF_MAIL'))->send(new AdminIndustrialAttachment($applicationDetails));
        
        return view('front.attachment.details', [
            'details' => $details,
            'total' => $total,
            'html' => $html,
            'applicationDetails' => PersonalAccidentApplication::find($applicationId)
            
        ]);
    }

    public function submitApplication(Request $request, $id)
    {
        $details = Attachment::findorfail($id);
        if (!$details) {
            return  redirect()->route('front.attachment.internship')->with('error', 'An unexpected error occurred.Please try again.');
        }

        $requestId = Session::get('applicationId');

        $applicationDetails = PersonalAccidentApplication::where('id', $requestId)->first();
        if (!$applicationDetails) {
            return  redirect()->route('front.attachment.internship')->with('error', 'An unexpected error occurred.Please try again.');
        }
        if (Session::get('duration') == 3) {
            $amountPayable = $details->three_month;
        } elseif (Session::get('duration') == 6) {
            $amountPayable = $details->six_month;
        } else {
            $amountPayable = $details->one_year;
        }

        $comapanyName = InsuranceCompany::where('id', $id)->first()->name ?? 'null';
        $create = $applicationDetails->update([
            'companyName' => $comapanyName,
            'amount_payable' => $amountPayable,
            'insurance_id' => $id,
            'type' => 1
        ]);

        if (!$create) {
            return  back()->with('error', 'An unexpected error occurred.Please try again.');
        }
        //
        //        $request->session()->flash('success', 'Applications submitted successfully.We will get back to you shortly.');
        //Mail::to($applicationDetails->email)->send(new IndustrialAttachment(PersonalAccidentApplication::find($requestId)));
        Mail::to(env('ADMIN_NOTIF_MAIL'))->send(new AdminIndustrialAttachment(PersonalAccidentApplication::find($requestId)));

        //        $message = "Your Industrial attachment insurance application to Insurancemaramoja was successful.We will get back to you shortly.";
        //        sendSms($create->phone,$message);
        //        return response()->json([
        //            'response' => true,
        //            'message' => "Applications submitted successfully.We will get back to you shortly."
        //        ]);
        $type = 'paynow';
        if ($type === 'paynow') {
            return redirect()->route('front.attachment.pay', $applicationDetails->id)->with('success', 'Request received.Pay now to complete request.');
        }
        return back()->with("success", "Applications submitted successfully.You will be contacted shortly.");
    }

    public function pay($applicationId)
    {
        $details = PersonalAccidentApplication::findOrFail($applicationId);

        $update = $details->update([
            'complete' => true
        ]);

        $payment = Payment::where('ref_id', $details->id)
            ->where('type', Payment::TYPE_ATTACHMENT)
            ->first();
        if (!$payment) {
            $payment = Payment::create([
                'ref_id' => $details->id,
                'amount' => $details->amount_payable,
                'type' => Payment::TYPE_ATTACHMENT,
                'phone' => Session::get('phoneNumber'),
                'paid_amount' => 0
            ]);
        }else{
            $payment->update(['amount'=> $details->amount_payable]);
        }

        return view('front.attachment.pay', [
            'details' => $details,
            'payment' => $payment
        ]);
    }
}

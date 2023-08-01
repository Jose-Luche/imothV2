<?php

namespace App\Http\Controllers\Front\Insurance;

use App\Http\Controllers\Controller;
use App\Mail\Admin\AdminIndustrialAttachment;
use App\Mail\User\IndustrialAttachment;
use App\Models\Attachment;
use App\Models\InsuranceCompany;
use App\Models\OtherPersonalAccidentApplication;
use App\Models\Payment;
use App\Models\PersonalAccident;
use App\Models\PersonalAccidentApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class OtherPersonalAccidentController extends Controller
{
    public function index()
    {
        return view('front.personalAccident.index');
    }

    public function submit(Request $request)
    {
        $validator = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'phoneNumber' => 'required',
            'email' => 'email|required',
            'startDate' => 'required|date',
            'duration' => 'required',
        ]);


        //Create the user here and store the reference id.
        $create = OtherPersonalAccidentApplication::create([
            'firstName' => $request->input('firstName'),
            'lastName' => $request->input('lastName'),
            'phone' => $request->input('phoneNumber'),
            'email' => $request->input('email'),
            'startDate' => $request->input('startDate'),
            'duration' => $request->input('duration'),
            'companyName' => $request->companyName,
            'category' => $request->category,
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
        $request->session()->put('category', $request->input('category'));
        //$request->session()->put('companyName', 1);

        $request->session()->put('applicationId', $create->id);

        return redirect()->route('front.personalAccident.quotes');
    }

    public function quotes()
    {
        $duration = \Illuminate\Support\Facades\Session::get('duration');
        $category = \Illuminate\Support\Facades\Session::get('category');
        $applicationId = \Illuminate\Support\Facades\Session::get('applicationId');

        if ($duration == 3) {
            $type = 'three_month';
        } elseif ($duration == 6) {
            $type = 'six_month';
        } else {
            $type = 'one_year';
        }

        $covers = PersonalAccident::where('category', $category )->get();

        return view('front.personalAccident.quotes', ['covers' => $covers, 'duration' => $type, 'applicationId'=>$applicationId]);
    }

    public function quoteDetails($id)
    {

        $total = 0;
        $details = PersonalAccident::findorfail($id);
        /**Since we have the Duration Session Period Details, get the Premium Payable**/
        $duration = \Illuminate\Support\Facades\Session::get('duration');
        $applicationId = \Illuminate\Support\Facades\Session::get('applicationId');

        if ($duration == 3) {
            $total = $details->three_month;
        } elseif ($duration == 6) {
            $total = $details->six_month;
        } else {
            $total = $details->one_year;
        }
        $html = ' <p>Total Premium Payable:  <span style="float: right"><b>' . number_format($total, 2) . '</b></span></p>';
        return view('front.personalAccident.details', [
            'details' => $details,
            'total' => $total,
            'html' => $html,
            'applicationDetails' => OtherPersonalAccidentApplication::find($applicationId)
        ]);
    }

    public function submitApplication(Request $request, $id)
    {
        $details = PersonalAccident::findorfail($id);
        if (!$details) {
            return  redirect()->route('front.personalAccident.index')->with('error', 'An unexpected error occurred.Please try again.');
        }

        $requestId = Session::get('applicationId');

        $applicationDetails = OtherPersonalAccidentApplication::where('id', $requestId)->first();
        if (!$applicationDetails) {
            return  redirect()->route('front.personalAccident.index')->with('error', 'An unexpected error occurred.Please try again.');
        }
        if (Session::get('duration') == 3) {
            $amountPayable = $details->three_month;
        } elseif (Session::get('duration') == 6) {
            $amountPayable = $details->six_month;
        } else {
            $amountPayable = $details->one_year;
        }
        $comapnyName = InsuranceCompany::where('id', $id)->first()->name ?? 'null';
        $create = $applicationDetails->update([
            'companyName' => $comapnyName,
            'premiumPayable' => $amountPayable,
            'insurance_id' => $id,
            'type' => 1
        ]);

        if (!$create) {
            return  back()->with('error', 'An unexpected error occurred.Please try again.');
        }
        //
        //        $request->session()->flash('success', 'Applications submitted successfully.We will get back to you shortly.');
        //Mail::to($applicationDetails->email)->send(new IndustrialAttachment(PersonalAccidentApplication::find($requestId)));
        //Mail::to(env('ADMIN_NOTIF_MAIL'))->send(new AdminIndustrialAttachment(PersonalAccidentApplication::find($requestId)));

        //        $message = "Your Industrial attachment insurance application to Insurancemaramoja was successful.We will get back to you shortly.";
        //        sendSms($create->phone,$message);
        //        return response()->json([
        //            'response' => true,
        //            'message' => "Applications submitted successfully.We will get back to you shortly."
        //        ]);

        $type = 'paynow';
        if ($type === 'paynow') {
            return redirect()->route('front.personalAccident.pay', $applicationDetails->id)->with('success', 'Request received.Pay now to complete request.');
        }
        return back()->with("success", "Applications submitted successfully.You will be contacted shortly.");
    }

    public function pay($applicationId)
    {
        $details = OtherPersonalAccidentApplication::findOrFail($applicationId);

       $details->update([
            'complete' => true
        ]);

        $payment = Payment::where('ref_id', $details->id)
            ->where('type', Payment::TYPE_ATTACHMENT_PA)
            ->first();
        if (!$payment) {
            $payment = Payment::create([
                'ref_id' => $details->id,
                'amount' => $details->premiumPayable,
                'type' => Payment::TYPE_ATTACHMENT_PA,
                'phone' => Session::get('phoneNumber'),
                'paid_amount' => 0
            ]);
        }else{
            $payment->update(['amount'=> $details->premiumPayable]);
        }

        return view('front.personalAccident.pay', [
            'details' => $details,
            'payment' => $payment
        ]);
    }
}

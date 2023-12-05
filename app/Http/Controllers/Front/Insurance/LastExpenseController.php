<?php

namespace App\Http\Controllers\Front\Insurance;

use App\Http\Controllers\Controller;
use App\Mail\Admin\AdminIndustrialAttachment;
use App\Mail\Admin\AdminLastExpenseEmail;
use App\Mail\AdminLastExpenseMail;
use App\Models\InsuranceCompany;
use App\Models\LastExpense;
use App\Models\LastExpenseApplication;
use App\Models\OtherPersonalAccidentApplication;
use App\Models\Payment;
use App\Models\PersonalAccident;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class LastExpenseController extends Controller
{
    public function index()
    {
        return view('front.lastExpense.index');
    }

    public function submit(Request $request)
    {
        $validator = $request->validate([
            'principalName' => 'required',
            'principalAge' => 'required|numeric',
            'commencementDate' => 'required|date',
        ]);

        $endDate = Carbon::parse($request->commencementDate)->addYear();

        $request->session()->put('principalName', $request->input('principalName') ?? '');
        $request->session()->put('principalAge', $request->input('principalAge') ?? 0);
        $request->session()->put('spouseName', $request->input('spouseName') ?? '');
        $request->session()->put('hasSpouse', $request->input('hasSpouse') ?? 0);
        $request->session()->put('childOneName', $request->input('childOne') ?? '');
        $request->session()->put('childOneAge', $request->input('childOneAge') ?? 0);
        $request->session()->put('childTwoName', $request->input('childTwo') ?? '');
        $request->session()->put('childTwoAge', $request->input('childTwoAge') ?? 0);
        $request->session()->put('childThreeName', $request->input('childThree') ?? '');
        $request->session()->put('childThreeAge', $request->input('childThreeAge') ?? 0);
        $request->session()->put('childFourName', $request->input('childFour') ?? '');
        $request->session()->put('childFourAge', $request->input('childFourAge') ?? 0);
        $request->session()->put('childFiveName', $request->input('childFive') ?? '');
        $request->session()->put('childFiveAge', $request->input('childFiveAge') ?? 0);
        $request->session()->put('childSixName', $request->input('childSix') ?? '');
        $request->session()->put('childSixAge', $request->input('childSixAge') ?? 0);

        $request->session()->put('fatherName', $request->input('fatherName') ?? '');
        $request->session()->put('fatherAge', $request->input('fatherAge') ?? 0);
        $request->session()->put('motherName', $request->input('motherName') ?? '');
        $request->session()->put('motherAge', $request->input('motherAge') ?? 0);

        $request->session()->put('fatherInLawName', $request->input('fatherInLawName') ?? '');
        $request->session()->put('fatherInLawAge', $request->input('fatherInLawAge') ?? 0);
        $request->session()->put('motherInLawName', $request->input('motherInLawName') ?? '');
        $request->session()->put('motherInLawAge', $request->input('motherInLawAge') ?? 0);

        $request->session()->put('endDate', $endDate);
        $request->session()->put('commencementDate', $request->input('commencementDate'));

        return redirect()->route('front.lastExpense.bio');
    }

    public function userBio()
    {
        return view('front.lastExpense.bio');
    }

    public function submitBio(Request $request)
    {
        $validatedData = $request->validate([
            'firstName' => 'required|max:255',
            'lastName' => 'required',
            'phoneNumber'=> 'required|numeric|min:10',
            'email'=>'required|email'
        ]);

        $request->session()->put('firstName', $request->input('firstName'));
        $request->session()->put('lastName', $request->input('lastName'));
        $request->session()->put('phone', $request->input('phoneNumber'));
        $request->session()->put('email', $request->input('email'));

        /**Once I have the Covers, I now proceed to Store them in the Database so that I can see available Covers**/
        $create = LastExpenseApplication::create([
            'firstName'=>Session::get('firstName'),
            'lastName'=>Session::get('lastName'),
            'phone'=>Session::get('phone'),
            'email'=>Session::get('email'),
            'commencementDate'=>Session::get('commencementDate'),
            'endDate'=>Session::get('endDate'),
            'principalName'=>Session::get('principalName'),
            'principalAge'=>Session::get('principalAge'),
            'spouseName'=>Session::get('spouseName'),
            'spouseAge'=>Session::get('spouseAge'),
            'childOneName'=>Session::get('childOneName'),
            'childOneAge'=>Session::get('childOneAge'),
            'childTwoName'=>Session::get('childTwoName'),
            'childTwoAge'=>Session::get('childTwoAge'),
            'childThreeName'=>Session::get('childThreeName'),
            'childThreeAge'=>Session::get('childThreeAge'),
            'childFourName'=>Session::get('childFourName'),
            'childFourAge'=>Session::get('childFourAge'),
            'childFiveName'=>Session::get('childFiveName'),
            'childFiveAge'=>Session::get('childFiveAge'),
            'childSixName'=>Session::get('childSixName'),
            'childSixAge'=>Session::get('childSixAge'),
            'fatherName'=>Session::get('fatherName'),
            'fatherAge'=>Session::get('fatherAge'),
            'motherName'=>Session::get('motherName'),
            'motherAge'=>Session::get('motherAge'),
            'fatherInLawName'=>Session::get('fatherInLawName'),
            'fatherInLawAge'=>Session::get('fatherInLawAge'),
            'motherInLawName'=>Session::get('motherInLawName'),
            'motherInLawAge'=>Session::get('motherInLawAge'),
            'premiumPayable'=>0,

        ]);
        //Mail::to($create->email)->send(new BidBondEmail($create));
        Mail::to(env('ADMIN_NOTIF_MAIL'))->send(new AdminLastExpenseEmail($create));

        return redirect()->route('front.lastExpense.covers',$create->id);
    }

    public function covers($id)
    {
        $covers = LastExpense::orderBy('limit','ASC')->orderBy('companyId')->paginate(10);
        $applicationDetails = LastExpenseApplication::find($id);

        /**Premium Workings**/
        $html = "";
        $coverDetails = [];
        foreach($covers as $cover){
            $totalPremium = 0;

            $html = '<p>Principal Limit: <b style="float:right">'. number_format($cover->limit).'</b></p>';
            $html .= '<p>Spouse Limit: <b style="float:right">'. number_format($cover->spouse_limit).'</b></p>';
            $html .= '<p>Child Limit: <b style="float:right">'. number_format($cover->child_limit).'</b></p>';
            $html .= '<p>Parents Limit: <b style="float:right">'. number_format($cover->parent_limit).'</b></p>';
            $html .= '<hr>';
            /**Basic Premium Part**/
            $html .= '<p>Basic Premium: ';
            $html .= '<span style="float: right">'.number_format($cover->premium,2).'</span>';

            $totalBasicPremium = $cover->premium;
            $phcf = round(0.25/100 * $totalBasicPremium,2);
            $itl = round(0.2/100 * $totalBasicPremium,2);
            $stampDuty = 40;
            $totalPremiumPayable = $totalBasicPremium + $phcf + $itl + $stampDuty;
            $html .= '</p>';
            $html .= '<hr>';
            $html .= '<p>Total Basic Premium: <span style="float: right">'.number_format($totalBasicPremium,2).'</span></p>';
            $html .= '<p>PHCF (0.25%): <span style="float: right">'.number_format($phcf,2).'</span></p>';
            $html .= '<p>ITL (0.2%): <span style="float: right">'.number_format($itl,2).'</span></p>';
            $html .= '<p>Stamp Duty: <span style="float: right">'.number_format($stampDuty,2).'</span></p>';
            $html .= '<hr>';
            $html .= ' <p>Total Premium Payable:  <span style="float: right"><b>'.number_format($totalPremiumPayable,2).'</b></span></p>';

            $coverDetails[] =[
                'cover' => $cover,
                'html' => $html,
            ];
        }
        return view('front.lastExpense.covers',[
            'covers'=>$coverDetails,
            'applicationDetails' =>$applicationDetails,

        ]);
    }

    public function coverDetails($applicationId, $id)
    {
        $details = LastExpense::findOrfail($id);
        $cover = $details;

        $applicationDetails = LastExpenseApplication::find($applicationId);

        /**Premium Workings**/
        $html = "";
        $coverDetails = [];
        $totalPremium = 0;

        $html = '<p>Principal Limit: <b style="margin-left: 20px">'. number_format($details->limit).'</b></p>';
        $html .= '<p>Spouse Limit: <b style="margin-left: 20px">'. number_format($details->spouse_limit).'</b></p>';
        $html .= '<p>Child Limit: <b style="margin-left: 20px">'. number_format($details->child_limit).'</b></p>';
        $html .= '<p>Parents Limit: <b style="margin-left: 20px">'. number_format($details->parent_limit).'</b></p>';
        /**Basic Premium Part**/
        $html .= '<p>Basic Premium: ';
        $html .= '<span style="float: right">'.number_format($details->premium,2).'</span>';

        $totalBasicPremium = $details->premium;
        $phcf = round(0.25/100 * $totalBasicPremium,2);
        $itl = round(0.2/100 * $totalBasicPremium,2);
        $stampDuty = 40;
        $totalPremiumPayable = $totalBasicPremium + $phcf + $itl + $stampDuty;
        $html .= '</p>';
        $html .= '<hr>';
        $html .= '<p>Total Basic Premium: <span style="float: right">'.number_format($totalBasicPremium,2).'</span></p>';
        $html .= '<p>PHCF (0.25%): <span style="float: right">'.number_format($phcf,2).'</span></p>';
        $html .= '<p>ITL (0.2%): <span style="float: right">'.number_format($itl,2).'</span></p>';
        $html .= '<p>Stamp Duty: <span style="float: right">'.number_format($stampDuty,2).'</span></p>';
        $html .= '<hr>';
        $html .= ' <p>Total Premium Payable:  <span style="float: right"><b>'.number_format($totalPremiumPayable,2).'</b></span></p>';

        $applicationDetails->update(['premiumPayable' => $totalPremiumPayable]);

        /**We will work on the Email to be send to the Admin**/
        //Mail::to(env('ADMIN_NOTIF_MAIL'))->send(new AdminTravelEmail($applicationDetails));

        return view('front.lastExpense.details',[
            'covers'=>$coverDetails,
            'applicationDetails' =>$applicationDetails,
            'total' => $totalPremiumPayable,
            'html' => $html,
            'details'=>$details,
        ]);
    }

    public function submitApplication(Request $request, $id)
    {
        $request->session()->put('quoteId', $id);

        $create = LastExpenseApplication::findOrFail($id);

        //Mail::to(env('ADMIN_NOTIF_MAIL'))->send(new AdminHealthEmail($create));

        $message = "Your Travel Insurance application to Insurancemaramoja was successful.We will get back to you shortly.";
//        sendSms($create->phone,$message);
        if (!$create)
        {
            return back()->with('error','An unexpected error occurred.Please reload and try again.');
        }

        $type = "paynow";
        if ($type === 'paynow'){
            return redirect()->route('front.lastExpense.pay',$create->id)->with('success','Request received.Pay now to complete request.');
        }

        return back()->with('success','Request placed successfully.We will get back to you shortly.');
    }

    public function pay($applicationId)
    {
        $details = LastExpenseApplication::findOrFail($applicationId);


        $payment = Payment::where('ref_id', $details->id)
            ->where('type', 'lastExpense')
            ->first();
        if (!$payment) {
            $payment = Payment::create([
                'ref_id' => $details->id,
                'amount' => $details->premiumPayable,
                'type' => 'lastExpense',
                'phone' => Session::get('phoneNumber'),
                'paid_amount' => 0
            ]);
        }else{
            $payment->update(['amount'=> $details->premiumPayable]);
        }

        return view('front.lastExpense.pay', [
            'details' => $details,
            'payment' => $payment
        ]);
    }
}

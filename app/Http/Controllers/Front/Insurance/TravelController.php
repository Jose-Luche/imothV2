<?php

namespace App\Http\Controllers\Front\Insurance;

use Carbon\Carbon;
use App\Models\BidBond;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Mail\User\BidBondEmail;
use App\Models\MotorApplication;
use App\Models\TravelApplication;
use App\Mail\Admin\AdminThirdParty;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\Admin\AdminBidBondEmail;
use App\Models\Travel;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class TravelController extends Controller
{
    public function index()
    {
        $data = [];//Travel::select('limit')->groupBy('limit')->get();
        return view('front.travel.index', compact('data'));
    }

    public function submitTravelDetails(Request $request)
    {
        $validator = $request->validate([
            'travelFrom' => 'required',
            'travelTo' => 'required',
            'period' => 'required|integer|gt:0',
            'startDate' => 'required|date',
            'description' => 'required',
            //'limit' => 'required',
//            'endDate'=>'required|date|after:yesterday'
        ]);


        $endDate = Carbon::parse($request->startDate)->addDays($request->period);
        $request->session()->put('travelFrom', $request->input('travelFrom'));
        $request->session()->put('travelTo', $request->input('travelTo'));
        $request->session()->put('endDate', $endDate);
        $request->session()->put('period', $request->input('period'));
        $request->session()->put('startDate', $request->input('startDate'));
        $request->session()->put('description', $request->input('description'));
        //$request->session()->put('limit', $request->input('limit'));

        return redirect()->route('front.travel.bio');
    }

    public function userBio()
    {
        return view('front.travel.bio');
    }

    public function submitBio(Request $request)
    {
        $validatedData = $request->validate([
            'firstName' => 'required|max:255',
            'lastName' => 'required',
            'mobile'=> 'required|numeric',
            'email'=>'required|email'
        ]);

        $request->session()->put('firstName', $request->input('firstName'));
        $request->session()->put('lastName', $request->input('lastName'));
        $request->session()->put('mobile', $request->input('mobile'));
        $request->session()->put('email', $request->input('email'));

        $create = TravelApplication::create([
            'firstName'=>Session::get('firstName'),
            'lastName'=>Session::get('lastName'),
            'mobile'=>Session::get('mobile'),
            'email'=>Session::get('email'),
            'travelFrom'=>Session::get('travelFrom'),
            'travelTo'=>Session::get('travelTo'),
            'period'=>Session::get('period'),
            'startDate'=>Session::get('startDate'),
            'endDate'=>Session::get('endDate'),
            'description'=>Session::get('description'),
            //'limit'=>Session::get('limit'),
            'quoteId' => 0

        ]);


        return redirect()->route('front.travel.covers', $create->id)->with('success', 'Request placed successfully. We will reach out immediately');
    }

    public function covers($id)
    {
        $covers = [];
        $applicationDetails = TravelApplication::find($id);

        //dd($covers);

        /*if ((int)Session::get('limit') == null) {
            return redirect()->route('front.travel.index')
                ->with('error', 'Please fill all the required details.');
        }*/

         /**Premium Workings**/
         $html = "";
         $coverDetails = [];
         foreach($covers as $cover){
             $totalPremium = 0;

             $html = '<p>Sum Insured: <b style="margin-left: 20px">'. number_format($applicationDetails->limit).'</b></p>';
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
        return view('front.travel.covers',[
            'covers'=>$coverDetails,
            'applicationDetails' =>$applicationDetails,

        ]);
    }


    public function coverDetails($applicationId, $id)
    {

        $details = Travel::findOrfail($id);
        $cover = [];//Travel::where('limit', Session::get('limit'))->where('companyId', $id)->first();

        $applicationDetails = TravelApplication::find($applicationId);

        $updateApplication = $applicationDetails->update([
            'quoteId'=>$details->id
        ]);
        if (!$updateApplication){
            return back()->with('error','An unexpected error occurred please try again.');
        }

        /**Premium Workings**/
        $html = "";
        $coverDetails = [];
        $totalPremium = 0;

            $html = '<p>Sum Insured: <b style="margin-left: 20px">'. number_format($applicationDetails->limit).'</b></p>';
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

            $applicationDetails->update(['expectedValue' => $totalPremiumPayable]);
       return view('front.travel.details',[
           'covers'=>$coverDetails,
           'applicationDetails' =>$applicationDetails,
           'total' => $totalPremiumPayable,
            'html' => $html,
            'details'=>$details,
       ]);
    }

    public function submitApplication(Request $request,$id)
    {
        $request->session()->put('quoteId', $id);

        $create = TravelApplication::findOrFail($id);

        //Mail::to($create->email)->send(new BidBondEmail($create));
        //Mail::to(env('ADMIN_NOTIF_MAIL'))->send(new AdminBidBondEmail($create));

        $message = "Your Travel Insurance application to Insurancemaramoja was successful.We will get back to you shortly.";
//        sendSms($create->phone,$message);
        if (!$create)
        {
            return back()->with('error','An unexpected error occurred.Please reload and try again.');
        }

        $type = "paynow";
        if ($type === 'paynow'){
            return redirect()->route('front.travel.pay',$create->id)->with('success','Request received.Pay now to complete request.');
        }
        return back()->with('success','Request placed successfully.We will get back to you shortly.');
    }


    public function pay($id)
    {
        $details = TravelApplication::findOrFail($id);

        $payment = Payment::where('ref_id',$details->id)
            ->where('type','travel')
            ->first();
        if (!$payment){
            $payment = Payment::create([
                'ref_id'=>$details->id,
                'amount'=>$details->expectedValue,
                'type'=>'travel',
                'phone'=>Session::get('phoneNumber'),
                'paid_amount'=>0
            ]);
        }

        return view('front.travel.pay',[
            'details'=>$details,
            'payment'=>$payment
        ]);
    }

}

<?php

namespace App\Http\Controllers\Front\Insurance;

use Carbon\Carbon;
use App\Models\Health;
use App\Models\BidBond;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Mail\User\BidBondEmail;
use App\Models\BidBondApplication;
use App\Models\HealthSpousePremium;
use App\Http\Controllers\Controller;
use App\Mail\Admin\AdminHealthEmail;
use Illuminate\Support\Facades\Mail;
use App\Mail\Admin\AdminBidBondEmail;
use App\Models\HealthPrincipalPremium;
use Illuminate\Support\Facades\Session;
use App\Models\HealthInsuranceApplication;

class HealthController extends Controller
{
    public function index()
    {
        return view('front.health.index');
    }

    public function submitHealthDetails(Request $request)
    {
        $validator = $request->validate([
            'principalAge' => 'required',
            'commencementDate' => 'required|date',
        ]);


        $endDate = Carbon::parse($request->commencementDate)->addDays(365);

        $request->session()->put('principalAge', $request->input('principalAge') ?? 0);
        $request->session()->put('hasSpouse', $request->input('hasSpouse') ?? 0);
        $request->session()->put('hasChildren', $request->input('hasChildren') ?? 0);
        $request->session()->put('endDate', $endDate);
        $request->session()->put('spouseAge', $request->input('spouseAge') ?? 0);
        $request->session()->put('childrenNumber', $request->input('childrenNumber') ?? 0);
        $request->session()->put('commencementDate', $request->input('commencementDate'));

        return redirect()->route('front.health.bio');
    }


    public function userBio()
    {
        return view('front.health.bio');
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

        /**Once I have the Covers, I now proceed to Store them in the Database so that i can see available Covers**/
        $create = HealthInsuranceApplication::create([
            'firstName'=>Session::get('firstName'),
            'lastName'=>Session::get('lastName'),
            'phone'=>Session::get('phone'),
            'email'=>Session::get('email'),
            'commencementDate'=>Session::get('commencementDate'),
            'endDate'=>Session::get('endDate'),
            'principalAge'=>Session::get('principalAge'),
            'spouseAge'=>Session::get('spouseAge'),
            'childrenNumber'=>Session::get('childrenNumber'),
            'premiumPayable'=>0,
            'expectedValue'=>0
        ]);
        //Mail::to($create->email)->send(new BidBondEmail($create));
        //Mail::to(env('ADMIN_NOTIF_MAIL'))->send(new AdminBidBondEmail($create));

        return redirect()->route('front.health.covers',$create->id);
    }

    public function covers($id)
    {
        $covers = Health::orderBy('limit','ASC')->orderBy('companyId')->paginate(10);
        $applicationDetails = HealthInsuranceApplication::find($id);

        /**Premium Workings**/
        $html = "";
        $coverDetails = [];
        foreach($covers as $cover){
            /**Only Show Coveres whose Age Limits have been setup**/
            if(HealthPrincipalPremium::where('limitId', $cover->id)->first()){

                /**Add a Hidden Input that will carry the Insurance Company ID**/
                $totalPremium = 0;
                $html = '<p>Inpatient Limit: <b style="margin-left: 20px">'. number_format($cover->limit).'</b></p>';
                /**Basic Premium Part**/
                $principalPremiumDetails = HealthPrincipalPremium::where('limitId', $cover->id)
                    ->where('age_from', '<=', $applicationDetails->principalAge)
                    ->where('age_to', '>=', $applicationDetails->principalAge)->first();
                /**We can get the Following Premiums**/
                $principalPremium = $principalPremiumDetails->princ_premium ?? 0;
                $html .= '<p>Principal Premium: ';
                $html .= '<span style="float: right">'.number_format($principalPremium,2).'</span>';

                /**Spouse Premium**/
                $spousePremium = 0;
                if($applicationDetails->spouseAge > 0){
                    $spousePremiumDetails = HealthSpousePremium::where('limitId', $cover->id)
                        ->where('sp_age_from', '<=', $applicationDetails->spouseAge)
                        ->where('sp_age_to', '>=', $applicationDetails->spouseAge)->first();
                    $spousePremium = $spousePremiumDetails->sp_premium ?? 0;

                    $html .= '<p>Spouse Premium: ';
                    $html .= '<span style="float: right">'.number_format($spousePremium,2).'</span>';
                }
                /**If Kids is not equal to 0, show kids Premium**/
                $childrenPremium = 0;
                if($applicationDetails->childrenNumber > 0){
                    $childrenPremium = ($principalPremiumDetails->child_premium ?? 0) * $applicationDetails->childrenNumber ?? 0;
                    $html .= '<p>Children Premium: ';
                    $html .= '<span style="float: right">'.number_format($childrenPremium,2).'</span>';
                }


                $totalBasicPremium = $principalPremium + $spousePremium + $childrenPremium;
                $phcf = round(0.25/100 * $totalBasicPremium,2);
                $itl = round(0.2/100 * $totalBasicPremium,2);
                $stampDuty = 40;
                $totalPremiumPayable = $totalBasicPremium + $phcf + $itl + $stampDuty;
                $html .= '</p>';
                $html .= '<hr>';
                $html .= '<h3>Optional Benefits</h3>';
                $html .= '<div class="other-optional-benefits">';
                $html .= '<input type="hidden" class="insurerId" name="insurerId" value="'.$cover->id.'">';
                $html .= '<p> <input type="checkbox" name="outpatient" class="outpatient" value="yes"> Outpatient:';
                $html .= '<span style="float: right" class="outpatient-premium">0</span>';
                $html .= '</p>';
                $html .= '<div style="display:none" class="show-outpatient-selector">
                Per Person <input type="radio" name="op-type" value="pp" checked>
                <span style="float: right"> Per Family <input type="radio" name="op-type" value="pf"></span>
                <p> Select Plan:
                <span style="float: right">
                <select name="op-plan-limits" class="outpatient-plan-limits">
                <option value="">--Select Plan--</option>';
                foreach(Health::where('benefit_type', 'outpatient')->orderBy('limit', 'asc')->get() as $op){
                    $html .= '<option value="'.$op->limit.'">'.number_format($op->limit).'</option>';
                }
                $html .= '</select>
                </span>
                </p>
                <hr>
                </div>';

                $html .= '<p> <input type="checkbox" name="dental" class="dental" value="yes"> Dental:';
                $html .= '<span style="float: right" class="dental-premium">0</span>';
                $html .= '</p>';
                $html .= '<div style="display:none" class="show-dental-selector">
                <p> Select Plan:
                <span style="float: right">
                <select name="dental-plan-limits" class="dental-plan-limits">
                <option value="">--Select Plan--</option>';
                foreach(Health::where('benefit_type', 'dental')->orderBy('limit', 'asc')->get() as $dental){
                    $html .= '<option value="'.$dental->limit.'">'.number_format($dental->limit).'</option>';
                }
                $html .= '</select>
                </span>
                </p>
                <hr>
                </div>';
                $html .= '<p> <input type="checkbox" name="optical" class="optical" value="yes"> Optical: ';
                $html .= '<span style="float: right" class="optical-premium">0</span>';
                $html .= '</p>';
                $html .= '<div style="display:none" class="show-optical-selector">

                <p> Select Plan:
                <span style="float: right">
                <select name="optical-plan-limits" class="optical-plan-limits">
                <option value="">--Select Plan--</option>';
                foreach(Health::where('benefit_type', 'optical')->orderBy('limit', 'asc')->get() as $optical){
                    $html .= '<option value="'.$optical->limit.'">'.number_format($optical->limit).'</option>';
                }
                $html .= '</select>
                </span>
                </p>
                <hr>
                </div>';
                $html .= '<p> <input type="checkbox" name="maternity" class="maternity" value="yes"> Maternity:';
                $html .= '<span style="float: right" class="maternity-premium">0</span>';
                $html .= '</p>';
                $html .= '<div style="display:none" class="show-maternity-selector">
                <p> Select Plan:
                <span style="float: right">
                <select name="maternity-plan-limits" class="maternity-plan-limits">
                <option value="">--Select Plan--</option>';
                foreach(Health::where('benefit_type', 'maternity')->orderBy('limit', 'asc')->get() as $maternity){
                    $html .= '<option value="'.$maternity->limit.'">'.number_format($maternity->limit).'</option>';
                }
                $html .= '</select>
                </span>
                </p>

                </div>';
                $html .= '<hr>';
                $html .= '</div>';
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

        }

        //$quotes = BidBond::orderBy('rate','DESC')->get();
        return view('front.health.covers',[
            'html' => $html,
            'covers'=>$coverDetails,
            'applicationDetails'=>$applicationDetails,
        ]);
    }

     /**Update Limits for Outpatient Cover selected**/
     public function updateOutpatientCover($id, $activator, $limit,$pp_pf)
     {
         $res = 'error';
         if(HealthInsuranceApplication::where('id', $id)->update(
             [
             'op' => $activator,
             'pp_pf' => $pp_pf,
             'op_limit' => $limit
             ])
         ){
             $res = 'success';
             /**At this we can get the premium amount for the specified Item**/
         }
         return $res;

     }

    /**Update Limits for Dental Cover selected**/
    public function updateDentalCover($id, $activator, $limit)
    {
        $res = 'error';
        if(HealthInsuranceApplication::where('id', $id)->update(
            [
            'dental' => $activator,
            'dental_limit' => $limit
            ])
        ){
            $res = 'success';
        }
        return $res;

    }

    /**Update Limits for Optical Cover selected**/
    public function updateOpticalCover($id, $activator, $limit)
    {
        $res = 'error';
        if(HealthInsuranceApplication::where('id', $id)->update(
            [
            'optical' => $activator,
            'optical_limit' => $limit
            ])
        ){
            $res = 'success';
        }
        return $res;

    }

    /**Update Limits for Optical Cover selected**/
    public function updateMaternityCover($id, $activator, $limit)
    {
        $res = 'error';
        if(HealthInsuranceApplication::where('id', $id)->update(
            [
            'maternity' => $activator,
            'maternity_limit' => $limit
            ])
        ){
            $res = 'success';
        }
        return $res;

    }


    public function coverDetails($applicationId,$id)
    {
        $details = Health::findOrfail($id);
        $applicationDetails = HealthInsuranceApplication::findOrfail($applicationId);
        $cover = $details;
        $coverDetails = [];
        $totalPremiumPayable = 0;
        $html = '';
        /**Computations**/
        /**Only Show Coveres whose Age Limits have been setup**/
        if(HealthPrincipalPremium::where('limitId', $cover->id)->first()){
            $totalPremium = 0;
            $html = '<p>Inpatient Limit: <b style="margin-left: 20px">'. number_format($cover->limit).'</b></p>';
            /**Basic Premium Part**/

            $principalPremiumDetails = HealthPrincipalPremium::where('limitId', $cover->id)
                ->where('age_from', '<=', $applicationDetails->principalAge)
                ->where('age_to', '>=', $applicationDetails->principalAge)->first();
            /**We can get the Following Premiums**/
            $principalPremium = $principalPremiumDetails->princ_premium ?? 0;
            $html .= '<p>Principal Premium: ';
            $html .= '<span style="float: right">'.number_format($principalPremium,2).'</span>';



            /**Spouse Premium**/
            $spousePremium = 0;
            if($applicationDetails->spouseAge > 0){
                $spousePremiumDetails = HealthSpousePremium::where('limitId', $cover->id)
                    ->where('sp_age_from', '<=', $applicationDetails->spouseAge)
                    ->where('sp_age_to', '>=', $applicationDetails->spouseAge)->first();
                $spousePremium = $spousePremiumDetails->sp_premium ?? 0;

                $html .= '<p>Spouse Premium: ';
                $html .= '<span style="float: right">'.number_format($spousePremium,2).'</span>';
            }
            /**If Kids is not equal to 0, show kids Premium**/
            $childrenPremium = 0;
            if($applicationDetails->childrenNumber > 0){
                $childrenPremium = ($principalPremiumDetails->child_premium ?? 0) * $applicationDetails->childrenNumber ?? 0;
                $html .= '<p>Children Premium: ';
                $html .= '<span style="float: right">'.number_format($childrenPremium,2).'</span>';
            }


            $totalBasicPremium = $principalPremium + $spousePremium + $childrenPremium;
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
        $updateApplication = $applicationDetails->update([
            'premiumPayable'=>$totalPremiumPayable, 'limitId'=>$id,'companyId'=>$details->companyId
        ]);
        if (!$updateApplication){
            return back()->with('error','An unexpected error occurred please try again.');
        }
        //$applicationDetails->update(['expectedValue' => $totalPremiumPayable]);
        return view('front.health.details',[
            'total' => $totalPremiumPayable,
            'html' => $html,
            'details'=>$details,
            'applicationDetails'=>$applicationDetails,
        ]);
    }

    public function submitApplication(Request $request,$id)
    {


        //$message = "Your Health Insurance application to Imoth Insurance Brokers was successful.We will get back to you shortly.";
        //sendSms($create->phone,$message);

        //Mail::to($applicationDetails->email)->send(new BidBondEmail($applicationDetails));


       $request->session()->put('quoteId', $id);

        $create = HealthInsuranceApplication::findOrFail($id);

        //Mail::to(env('ADMIN_NOTIF_MAIL'))->send(new AdminHealthEmail($create));

        $message = "Your Travel Insurance application to Insurancemaramoja was successful.We will get back to you shortly.";
//        sendSms($create->phone,$message);
        if (!$create)
        {
            return back()->with('error','An unexpected error occurred.Please reload and try again.');
        }

        $type = "paynow";
        if ($type === 'paynow'){
            return redirect()->route('front.health.pay',$create->id)->with('success','Request received.Pay now to complete request.');
        }

        return back()->with('success','Request placed successfully.We will get back to you shortly.');
    }

    public function pay($id)
    {
        $details = HealthInsuranceApplication::findOrFail($id);

        $payment = Payment::where('ref_id',$details->id)
            ->where('type','health')
            ->first();
        if (!$payment){
            $payment = Payment::create([
                'ref_id'=>$details->id,
                'amount'=>$details->premiumPayable,
                'type'=>'health',
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

<?php

namespace App\Http\Controllers\Front\Insurance;

use App\Models\HealthFamilyPremium;
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
        $covers = Health::orderBy('limit','ASC')->where('benefit_type', 'inpatient')->orderBy('companyId')->paginate(10);
        $applicationDetails = HealthInsuranceApplication::find($id);

        /**Premium Workings**/
        $html = "";
        $coverDetails = [];
        foreach($covers as $cover){
            /**Only Show Covers whose Age Limits have been setup**/
            if(HealthPrincipalPremium::where('limitId', $cover->id)->first()){
                /**Add a Hidden Input that will carry the Insurance Company ID**/
                $totalPremium = 0;
                $html = '<div class="my-premiums-section">';
                $html .= '<p>Inpatient Limit: <b style="margin-left: 20px">'. number_format($cover->limit).'</b></p>';
                /**Basic Premium Part**/
                $principalPremiumDetails = HealthPrincipalPremium::where('limitId', $cover->id)
                    ->where('age_from', '<=', $applicationDetails->principalAge)
                    ->where('age_to', '>=', $applicationDetails->principalAge)->first();
                /**We can get the Following Premiums**/
                $principalPremium = $principalPremiumDetails->princ_premium ?? 0;

                $html .= '<table style="width: 100%; border-collapse: collapse">';
                $html .= '<tr>';
                $html .= '<td>Principal Premium:</td>';
                $html .= '<td><input style="float:right;text-align: right" name="principal-premium" class="principal-premium form-control" size="5" readonly value="'.$principalPremium.'"></td>';
                $html .= '</tr>';


                /**Spouse Premium**/
                $spousePremium = 0;
                if($applicationDetails->spouseAge > 0){
                    $spousePremiumDetails = HealthSpousePremium::where('limitId', $cover->id)
                        ->where('sp_age_from', '<=', $applicationDetails->spouseAge)
                        ->where('sp_age_to', '>=', $applicationDetails->spouseAge)->first();
                    $spousePremium = $spousePremiumDetails->sp_premium ?? 0;
                    $html .= '<tr>';
                    $html .= '<td>Spouse Premium:</td>';
                    $html .= '<td><input style="float:right;text-align: right" name="spouse-premium" class="spouse-premium form-control" size="5" readonly value="'.$spousePremium.'"></td>';
                    $html .= '</tr>';
                }
                /**If Kids is not equal to 0, show kids Premium**/
                $childrenPremium = 0;
                if($applicationDetails->childrenNumber > 0){
                    $childrenPremium = ($principalPremiumDetails->child_premium ?? 0) * $applicationDetails->childrenNumber ?? 0;

                    $html .= '<tr>';
                    $html .= '<td>Children Premium:</td>';
                    $html .= '<td><input style="float:right;text-align: right" name="children-premium" class="children-premium form-control" size="5" readonly value="'.$childrenPremium.'"></td>';
                    $html .= '</tr>';
                }
                $html .= '</table>';
                $totalBasicPremium = $principalPremium + $spousePremium + $childrenPremium;
                $phcf = round(0.25/100 * $totalBasicPremium,2);
                $itl = round(0.2/100 * $totalBasicPremium,2);
                $stampDuty = 40;
                $totalPremiumPayable = $totalBasicPremium + $phcf + $itl + $stampDuty;
                $html .= '</p>';
                $html .= '<hr>';
                $html .= '<h3>Optional Benefits</h3>';
                $html .= '<div class="other-optional-benefits">';
                $html .= '<input type="hidden" class="insurerId" name="insurerId" value="'.$cover->companyId.'">';
                $html .= '<input type="hidden" class="limitId" name="limitId" value="'.$cover->id.'">';


                /**Outpatient Section**/
                $html .= '<table style="width: 100%; border-collapse: collapse">';
                $html .= '<tr>';
                $html .= '<td><input type="checkbox" name="outpatient" class="outpatient" value="yes"> Outpatient:</td>';
                $html .= '<td><input style="float:right;text-align: right" name="outpatient-premium" class="outpatient-premium form-control" size="1" readonly value="0"></td>';
                $html .= '</tr>';
                $html .= '</table>';

                $html .= '<div style="display:none" class="show-outpatient-selector">
                <table style="width: 100%; border-collapse: collapse">
                <tr>
                    <td>Per Person <input type="radio" name="op-type" class="pp" value="pp"></td>
                    <td>Per Family <input type="radio" name="op-type" class="pf" value="pf"></span></td>
                </tr>
                <tr>
                    <td>Select Plan:</td>
                    <td>
                        <select name="outpatient-plan-limits" class="outpatient-plan-limits form-control" style="float: right;width: 100px">
                        <option value="">--Select Plan--</option>';
                foreach(Health::where('benefit_type', 'outpatient')->orderBy('limit', 'asc')->get() as $op){
                    $html .= '<option value="'.$op->limit.'">'.number_format($op->limit).' - '.strtoupper($op->pp_pf).'</option>';
                }
                $html .= '</select>
                    </td>
                </tr>
                </table>

                <hr>
                </div>';

                /**Dental Section**/
                $html .= '<table style="width: 100%; border-collapse: collapse">';
                $html .= '<tr>';
                $html .= '<td><input type="checkbox" name="dental" class="dental" value="yes"> Dental:</td>';
                $html .= '<td><input style="float:right;text-align: right" name="dental-premium" class="dental-premium form-control" size="1" readonly value="0"></td>';
                $html .= '</tr>';
                $html .= '</table>';

                $html .= '<div style="display:none" class="show-dental-selector">
                <table style="width: 100%; border-collapse: collapse">
                <tr>
                    <td>Select Plan:</td>
                    <td>
                        <select name="dental-plan-limits" class="dental-plan-limits form-control" style="float: right;width: 100px">
                        <option value="">--Select Plan--</option>';
                        foreach(Health::where('benefit_type', 'dental')->orderBy('limit', 'asc')->get() as $dental){
                            $html .= '<option value="'.$dental->limit.'">'.number_format($dental->limit).' - '.strtoupper($dental->pp_pf).'</option>';
                        }
                        $html .= '</select>
                    </td>
                </tr>
                </table>

                <hr>
                </div>';

                /**Optical Section**/
                $html .= '<table style="width: 100%; border-collapse: collapse">';
                $html .= '<tr>';
                $html .= '<td><input type="checkbox" name="optical" class="optical" value="yes"> Optical:</td>';
                $html .= '<td><input style="float:right;text-align: right" name="optical-premium" class="optical-premium form-control" size="1" readonly value="0"></td>';
                $html .= '</tr>';
                $html .= '</table>';

                $html .= '<div style="display:none" class="show-optical-selector">
                <table style="width: 100%; border-collapse: collapse">
                <tr>
                    <td>Select Plan:</td>
                    <td>
                        <select name="optical-plan-limits" class="optical-plan-limits form-control" style="float: right;width: 100px">
                        <option value="">--Select Plan--</option>';
                foreach(Health::where('benefit_type', 'optical')->orderBy('limit', 'asc')->get() as $optical){
                    $html .= '<option value="'.$optical->limit.'">'.number_format($optical->limit).' - '.strtoupper($optical->pp_pf).'</option>';
                }
                $html .= '</select>
                    </td>
                </tr>
                </table>

                <hr>
                </div>';


                /**Maternity Section**/
                $html .= '<table style="width: 100%; border-collapse: collapse">';
                $html .= '<tr>';
                $html .= '<td><input type="checkbox" name="maternity" class="maternity" value="yes"> Maternity:</td>';
                $html .= '<td><input style="float:right;text-align: right" name="maternity-premium" class="maternity-premium form-control" size="1" readonly value="0"></td>';
                $html .= '</tr>';
                $html .= '</table>';

                $html .= '<div style="display:none" class="show-maternity-selector">
                <table style="width: 100%; border-collapse: collapse">
                <tr>
                    <td>Select Plan:</td>
                    <td>
                        <select name="maternity-plan-limits" class="maternity-plan-limits form-control" style="float: right;width: 100px">
                        <option value="">--Select Plan--</option>';
                foreach(Health::where('benefit_type', 'maternity')->orderBy('limit', 'asc')->get() as $maternity){
                    $html .= '<option value="'.$maternity->limit.'">'.number_format($maternity->limit).' - '.strtoupper($maternity->pp_pf).'</option>';
                }
                $html .= '</select>
                    </td>
                </tr>
                </table>
                <hr>
                </div>';

                /**Total Premium Section**/
                $html .= '<hr>';
                $html .= '</div>';
                $html .= '<table style="width: 100%; border-collapse: collapse">';
                $html .= '<tr>';
                $html .= '<td>Total Basic Premium:</td>';
                $html .= '<td><input style="float:right;text-align: right" name="total-basic-premium" class="total-basic-premium form-control" size="5" readonly value="'.$totalBasicPremium.'"></td>';
                $html .= '</tr>';

                $html .= '<tr>';
                $html .= '<td>PHCF (0.25%):</td>';
                $html .= '<td><input style="float:right;text-align: right" name="PHCF-premium" class="PHCF-premium form-control" size="5" readonly value="'.$phcf.'"></td>';
                $html .= '</tr>';

                $html .= '<tr>';
                $html .= '<td>ITL (0.2%):</td>';
                $html .= '<td><input style="float:right;text-align: right" name="ITL-premium" class="ITL-premium form-control" readonly size="5" value="'.$itl.'"></td>';
                $html .= '</tr>';

                $html .= '<tr>';
                $html .= '<td>Stamp Duty: </td>';
                $html .= '<td><input style="float:right;text-align: right" name="stamp-duty" class="stamp-duty form-control" size="5" readonly value="'.$stampDuty.'"></td>';
                $html .= '</tr>';
                $html .= '</table>';

                $html .= '<hr>';
                $html .= ' <p>Total Premium Payable:  <span style="float: right" class="total-premium"><b>'.number_format($totalPremiumPayable,2).'</b></span></p>';
                $html .= '</div>';

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
     public function updateOutpatientCover($id, $activator, $limit,$pp_pf, $insurerId=null)
     {
         $application = HealthInsuranceApplication::where('id', $id)->first();
         $res = 'error';
         if($application->update(
             [
             'op' => $activator,
             'pp_pf' => $pp_pf,
             'op_limit' => $limit
             ])
         ){
             $res = 0;
             /**At this we can get the premium amount for the specified Item: This is Depended on the Insurer ID also**/
             $outpatientPremium = 0;
             $specificCover = Health::where('companyId', $insurerId)->where('benefit_type', 'outpatient')->where('pp_pf', $pp_pf)->where('limit', $limit)->first();
             /**The Above Query will give us the Specific LimitID: Using it we can get premium Amounts Charged**/
             if($specificCover){
                 if($pp_pf == 'pf'){
                     /**We will look into the Health Family Premium Table**/
                     //We need to get the Family Size
                     $familySize = 'm';
                     /**Get the Family Size**/
                     if($application->spouseAge != null && ($application->childrenNumber == 0 || $application->childrenNumber == null)){
                         /**At this Stage, the Pricipal Member has Only Spouse: No Children**/
                         $familySize = 'm_plus_one';
                     }elseif ($application->spouseAge == null && ($application->childrenNumber != 0 || $application->childrenNumber != null)){
                         /**At this stage, the Principal Member has no Spouse but has Children**/
                         if($application->childrenNumber == 1){
                             $familySize = 'm_plus_one';
                         }elseif ($application->childrenNumber == 2){
                             $familySize = 'm_plus_two';
                         }elseif ($application->childrenNumber == 3){
                             $familySize = 'm_plus_three';
                         }elseif ($application->childrenNumber == 4){
                             $familySize = 'm_plus_four';
                         }elseif ($application->childrenNumber == 5){
                             $familySize = 'm_plus_five';
                         }
                     }elseif ($application->spouseAge != null && ($application->childrenNumber != 0 || $application->childrenNumber != null)){
                         /**At this stage, the Principal Member has both Spouse and Children**/
                         if($application->childrenNumber == 1){
                             $familySize = 'm_plus_two';
                         }elseif ($application->childrenNumber == 2){
                             $familySize = 'm_plus_three';
                         }elseif ($application->childrenNumber == 3){
                             $familySize = 'm_plus_four';
                         }elseif ($application->childrenNumber == 4){
                             $familySize = 'm_plus_five';
                         }
                     }
                     $maxAge = max($application->principalAge,$application->spouseAge);


                     $outpatientPremiumInstance = HealthFamilyPremium::where('limitId', $specificCover->id)->where('fm_age_from', '<=', $maxAge)
                         ->where('fm_age_to', '>=',$maxAge )->first();

                     if($outpatientPremiumInstance){
                         /**Our Premium will be the Column Value as below:**/
                         $outpatientPremium = $outpatientPremiumInstance[$familySize];
                     }
                     $res = $outpatientPremium;
                 }else{
                     /**Our Premiums will be from the Health Principal and Spouse Premium Table**/
                     $principalPremium = $spousePremium = $childrenPremium = 0;

                     /**We need to get the Principal Member Premium**/
                     $prinicipalInstance = HealthPrincipalPremium::where('limitId', $specificCover->id)->where('age_from', '<=', $application->principalAge)
                         ->where('age_to', '>=', $application->principalAge)->first();
                     if($prinicipalInstance){
                         $principalPremium = $prinicipalInstance->princ_premium;
                         /**At this Stage, we can get the Children Premium**/
                         if($application->childrenNumber != 0 && $application->childrenNumber != null){
                             $childrenPremium = $application->childrenNumber * $prinicipalInstance->child_premium;
                         }
                     }
                     $spouseInstance = HealthSpousePremium::where('limitId', $specificCover->id)->where('sp_age_from', '<=', $application->spouseAge)
                         ->where('sp_age_to', '>=', $application->spouseAge)->first();
                     if($spouseInstance){
                         $spousePremium = $spouseInstance->sp_premium;
                     }
                     $totalPremium = $principalPremium + $spousePremium + $childrenPremium;

                     $res = $totalPremium;
                 }
             }
         }
         return $res;
     }

    /**Update Limits for Dental Cover selected**/
    public function updateDentalCover($id, $activator, $limit,$insurerId=null)
    {
        $application = HealthInsuranceApplication::where('id', $id)->first();
        $res = 'error';
        if($application->update(
            [
            'dental' => $activator,
            'dental_limit' => $limit
            ])
        ){
            $res = 0;
            $specificCover = Health::where('companyId', $insurerId)->where('benefit_type', 'dental')->where('pp_pf', 'pp')->where('limit', $limit)->first();
            /**The Above Query will give us the Specific LimitID: Using it we can get premium Amounts Charged**/
            if($specificCover){
                /**Our Premiums will be from the Health Principal and Spouse Premium Table**/
                $principalPremium = $spousePremium = $childrenPremium = 0;

                /**We need to get the Principal Member Premium**/
                $prinicipalInstance = HealthPrincipalPremium::where('limitId', $specificCover->id)->where('age_from', '<=', $application->principalAge)
                    ->where('age_to', '>=', $application->principalAge)->first();
                if($prinicipalInstance){
                    $principalPremium = $prinicipalInstance->princ_premium;
                    /**At this Stage, we can get the Children Premium**/
                    if($application->childrenNumber != 0 && $application->childrenNumber != null){
                        $childrenPremium = $application->childrenNumber * $prinicipalInstance->child_premium;
                    }
                }
                $spouseInstance = HealthSpousePremium::where('limitId', $specificCover->id)->where('sp_age_from', '<=', $application->spouseAge)
                    ->where('sp_age_to', '>=', $application->spouseAge)->first();
                if($spouseInstance){
                    $spousePremium = $spouseInstance->sp_premium;
                }
                $totalPremium = $principalPremium + $spousePremium + $childrenPremium;

                $res = $totalPremium;
            }
        }
        return $res;

    }

    /**Update Limits for Optical Cover selected**/
    public function updateOpticalCover($id, $activator, $limit, $insurerId=null)
    {
        $application = HealthInsuranceApplication::where('id', $id)->first();
        $res = 'error';
        if($application->update(
            [
            'optical' => $activator,
            'optical_limit' => $limit
            ])
        ){
            $res = 0;
            $specificCover = Health::where('companyId', $insurerId)->where('benefit_type', 'optical')->where('pp_pf', 'pp')->where('limit', $limit)->first();
            /**The Above Query will give us the Specific LimitID: Using it we can get premium Amounts Charged**/
            if($specificCover){
                /**Our Premiums will be from the Health Principal and Spouse Premium Table**/
                $principalPremium = $spousePremium = $childrenPremium = 0;
                /**We need to get the Principal Member Premium**/
                $prinicipalInstance = HealthPrincipalPremium::where('limitId', $specificCover->id)->where('age_from', '<=', $application->principalAge)
                    ->where('age_to', '>=', $application->principalAge)->first();
                if($prinicipalInstance){
                    $principalPremium = $prinicipalInstance->princ_premium;
                    /**At this Stage, we can get the Children Premium**/
                    if($application->childrenNumber != 0 && $application->childrenNumber != null){
                        $childrenPremium = $application->childrenNumber * $prinicipalInstance->child_premium;
                    }
                }
                $spouseInstance = HealthSpousePremium::where('limitId', $specificCover->id)->where('sp_age_from', '<=', $application->spouseAge)
                    ->where('sp_age_to', '>=', $application->spouseAge)->first();
                if($spouseInstance){
                    $spousePremium = $spouseInstance->sp_premium;
                }
                $totalPremium = $principalPremium + $spousePremium + $childrenPremium;

                $res = $totalPremium;
            }
        }
        return $res;

    }

    /**Update Limits for Optical Cover selected**/
    public function updateMaternityCover($id, $activator, $limit,$insurerId=null)
    {
        $application = HealthInsuranceApplication::where('id', $id)->first();
        $res = 'error';
        if($application->update(
            [
            'maternity' => $activator,
            'maternity_limit' => $limit
            ])
        ){
            $res = 0;
            $specificCover = Health::where('companyId', $insurerId)->where('benefit_type', 'maternity')->where('pp_pf', 'pp')->where('limit', $limit)->first();
            /**The Above Query will give us the Specific LimitID: Using it we can get premium Amounts Charged**/
            if($specificCover){
                /**Our Premiums will be from the Health Principal and Spouse Premium Table**/
                $principalPremium = $spousePremium  = 0;
                /**We need to get the Principal Member Premium**/
                $prinicipalInstance = HealthPrincipalPremium::where('limitId', $specificCover->id)->where('age_from', '<=', $application->principalAge)
                    ->where('age_to', '>=', $application->principalAge)->first();
                if($prinicipalInstance){
                    $principalPremium = $prinicipalInstance->princ_premium;
                }
                $spouseInstance = HealthSpousePremium::where('limitId', $specificCover->id)->where('sp_age_from', '<=', $application->spouseAge)
                    ->where('sp_age_to', '>=', $application->spouseAge)->first();
                if($spouseInstance){
                    $spousePremium = $spouseInstance->sp_premium;
                }
                $totalPremium = max($principalPremium,$spousePremium);

                $res = $totalPremium;
            }
        }
        return $res;

    }
    /**We Need to update the Selected Cover**/
    public function updateSelectedCover($id,$limitId,$inpatientBasicPremium,$currentSelectedOutpatient,$currentSelectedDental,$currentSelectedOptical,$currentSelectedMaternity){
        $applicationDetails = HealthInsuranceApplication::findOrfail($id);

        if($applicationDetails){
            /**Update Database Columns with the Entered Entries**/
            $totalBasicPremium = $inpatientBasicPremium + $currentSelectedOutpatient + $currentSelectedDental + $currentSelectedOptical + $currentSelectedMaternity;
            $phcf = round(0.25/100*$totalBasicPremium,2);
            $itl = round(0.2/100*$totalBasicPremium,2);
            $stampDuty = 40;
            $totalPremiumPayable = $totalBasicPremium + $phcf + $itl + $stampDuty;
            $applicationDetails->update(
                [
                    'ip_premium' => $inpatientBasicPremium,
                    'op_premium' => $currentSelectedOutpatient,
                    'dental_premium' => $currentSelectedDental,
                    'optical_premium' => $currentSelectedOptical,
                    'maternity_premium' => $currentSelectedMaternity,
                    'total_basic_premium' => $totalBasicPremium,
                    'phcf' => $phcf,
                    'itl' => $itl,
                    'stamp_duty' => $stampDuty,
                    'premiumPayable' => $totalPremiumPayable
                ]
            );
            return $applicationDetails->id.'/'.$limitId;
            //return redirect()->route('front.health.details',['applicationId' => $applicationDetails->id, 'id' => $insurerId])->with('success','Your Option has been Saved for you');
        }
        return 'error';
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
        /**Only Show Covers whose Age Limits have been setup**/
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
            $totalPremiumPayable = $totalBasicPremium +$applicationDetails->op_premium + $applicationDetails->dental_premium + $applicationDetails->optical_premium + $applicationDetails->maternity_premium + $applicationDetails->phcf + $applicationDetails->itl + $applicationDetails->stamp_duty;
            $html .= '</p>';
            $html .= '<hr>';
            $html .= '<h5>Optional Benefits</h5>';
            $html .= '<p>Outpatient Basic Premium: <span style="float: right">'.number_format($applicationDetails->op_premium,2).'</span></p>';
            $html .= '<p>Dental Basic Premium: <span style="float: right">'.number_format($applicationDetails->dental_premium,2).'</span></p>';
            $html .= '<p>Optical Basic Premium: <span style="float: right">'.number_format($applicationDetails->optical_premium,2).'</span></p>';
            $html .= '<p>Maternity Basic Premium: <span style="float: right">'.number_format($applicationDetails->maternity_premium,2).'</span></p>';
            $html .= '<hr>';
            $html .= '<p>Total Basic Premium: <span style="float: right">'.number_format($applicationDetails->total_basic_premium,2).'</span></p>';
            $html .= '<p>PHCF (0.25%): <span style="float: right">'.number_format($applicationDetails->phcf,2).'</span></p>';
            $html .= '<p>ITL (0.2%): <span style="float: right">'.number_format($applicationDetails->itl,2).'</span></p>';
            $html .= '<p>Stamp Duty: <span style="float: right">'.number_format($applicationDetails->stamp_duty,2).'</span></p>';
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

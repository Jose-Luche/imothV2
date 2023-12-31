<?php

namespace App\Http\Controllers;

use App\Models\Health;
use App\Models\Travel;
use App\Models\BidBond;
use App\Models\Attachment;
use Illuminate\Http\Request;
use App\Models\Comprehensive;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\MotorApplication;
use App\Models\PersonalAccident;
use App\Models\TravelApplication;
use App\Models\BidBondApplication;
use App\Models\HealthSpousePremium;
use App\Models\HealthPrincipalPremium;
use Illuminate\Support\Facades\Session;
use App\Models\HealthInsuranceApplication;
use App\Models\LastExpense;
use App\Models\LastExpenseApplication;
use App\Models\OtherPersonalAccidentApplication;
use App\Models\PersonalAccidentApplication;

class QuotationController extends Controller
{
    public function quotationPdf($applicationId, $id,$type=null){

        $startDate = now();
        $applicationBenefits = [];
        $phone = "";
        if($type == 'motor'){
            $details = Comprehensive::findOrfail($id);
            $applicationDetails = MotorApplication::find($applicationId);
            $applicationBenefits = $applicationDetails->benefits;

            $class = 'Private Third Party Cover';
            if($applicationDetails->insuranceType == 1){
                $class = 'Private Comprehensive Cover';
            }
            $startDate = $applicationDetails->date;
            $phone = $applicationDetails->phone;

        }elseif($type == 'travel'){
            $details = Travel::findOrfail($id);
            $applicationDetails = TravelApplication::find($applicationId);
            $class = 'Travel Insurance Cover';
            $startDate = $applicationDetails->startDate;
            $phone = $applicationDetails->mobile;
        }elseif($type == 'bond'){
            $details = BidBond::findOrfail($id);
            $applicationDetails = BidBondApplication::find($applicationId);
            $class = 'Bid Bond Insurance Cover';
            $startDate = $applicationDetails->commencementDate;
            $phone = $applicationDetails->phone;
        }elseif($type == 'health'){
            $details = Health::findOrfail($id);
            $applicationDetails = HealthInsuranceApplication::find($applicationId);
            $class = 'Health Insurance Cover';
            $startDate = $applicationDetails->commencementDate;
            $phone = $applicationDetails->phone;
        }elseif($type == 'attachment'){
            $details = Attachment::findOrfail($id);
            $applicationDetails = PersonalAccidentApplication::find($applicationId);
            $class = 'Personal Accident Cover';
            $startDate = $applicationDetails->startDate;
            $phone = $applicationDetails->phone;
        }elseif($type == 'personalAccident'){
            $details = PersonalAccident::findOrfail($id);
            $applicationDetails = OtherPersonalAccidentApplication::find($applicationId);
            $class = 'Personal Accident Cover';
            $startDate = $applicationDetails->startDate;
            $phone = $applicationDetails->phone;
        }elseif($type == 'lastExpense'){
            $details = LastExpense::findOrfail($id);
            $applicationDetails = LastExpenseApplication::find($applicationId);
            $class = 'Last Expense Cover';
            $startDate = $applicationDetails->commencementDate;
            $phone = $applicationDetails->phone;
        }
        else{
            $class = "";
            die();
        }


        $updateApplication = $applicationDetails->update([
            'quoteId'=>$details->id
        ]);
        if (!$updateApplication){
            return back()->with('error','An unexpected error occurred please try again.');
        }

        /**Computations**/
        $totalPremium = 0;
        $cover = $details;
        //$html = '<p>Sum Insured: <b style="margin-left: 20px">'. number_format($applicationDetails->value).'</b></p>';
        /**Basic Premium Part**/
        if($type =="health"){
            $html = '<p>Inpatient Basic Premium: ';
        } else {
            $html = '<p>Basic Premium: ';
        }

        /**Go thrugh DIfferent sections**/
        $basicPremium = 0;
        if($type == 'motor'){
            if($cover->rate < 100){
                if(($cover->rate/100 * $applicationDetails->value ?? 0) < ($cover->minRate ?? 0)){
                    $basicPremium = $cover->minRate;
                }else{
                    $basicPremium = $cover->rate/100 * $applicationDetails->value ?? 0;
                }
            }else{
                $basicPremium = $cover->rate;
            }
        }elseif($type == 'lastExpense'){
            $basicPremium = $cover->premium;

        }elseif($type == 'travel'){

            $basicPremium = Travel::where('limit', $applicationDetails->limit)->where('companyId', $id)->first()->premium;

        }elseif($type == 'bond'){
            if($cover->rate < 100){
                if(($cover->rate/100 * $applicationDetails->bondValue ?? 0) < ($cover->minRate ?? 0)){
                    $basicPremium = $cover->minRate;
                }else{
                    $basicPremium = $cover->rate/100 * $applicationDetails->bondValue ?? 0;
                }
            }else{
                $basicPremium = $cover->rate;
            }
        } elseif($type == 'health'){
            $principalPremiumDetails = HealthPrincipalPremium::where('limitId', $cover->id)
                    ->where('age_from', '<=', $applicationDetails->principalAge)
                    ->where('age_to', '>=', $applicationDetails->principalAge)->first();
                $principalPremium = $principalPremiumDetails->princ_premium ?? 0;

            $spousePremiumDetails = HealthSpousePremium::where('limitId', $cover->id)
                    ->where('sp_age_from', '<=', $applicationDetails->spouseAge)
                    ->where('sp_age_to', '>=', $applicationDetails->spouseAge)->first();
                $spousePremium = $spousePremiumDetails->sp_premium ?? 0;
            $childrenPremium = ($principalPremiumDetails->child_premium ?? 0) * $applicationDetails->childrenNumber ?? 0;



            $basicPremium = $principalPremium + $spousePremium + $childrenPremium;// Inpatient Basic Premium


        } elseif($type == 'attachment'){
            $details = Attachment::findorfail($id);
            /**Since we have the Duration Session Period Details, get the Premium Payable**/
            $duration = Session::get('duration');
            if ($duration == 3) {
                $total = $details->three_month;
            } elseif ($duration == 6) {
                $total = $details->six_month;
            } else {
                $total = $details->one_year;
            }

            $basicPremium = $total;
        } elseif($type == 'personalAccident'){
            $details = PersonalAccident::findorfail($id);
            /**Since we have the Duration Session Period Details, get the Premium Payable**/
            $duration = Session::get('duration');
            if ($duration == 3) {
                $total = $details->three_month;
            } elseif ($duration == 6) {
                $total = $details->six_month;
            } else {
                $total = $details->one_year;
            }

            $basicPremium = $total;
        }

        $html .= '<span style="float: right">'.number_format($basicPremium,2).'</span>';

        /**Available Benefits Section**/
        $totalBenefits = 0;
        if($type == 'motor'){
            if($cover->benefits != null){
                foreach($cover->benefits as $benefit){
                    $benefitAmount = 0;
                    $html .= ' <p>'.$benefit->name.': ';
                    if($benefit->rate < 100){
                        if(($benefit->rate/100 * $applicationDetails->value ?? 0) < ($benefit->price ?? 0)){
                            $benefitAmount = $benefit->price;
                            $html .= '<span style="float: right">'.number_format($benefitAmount).'</span>';
                        }else{
                            $benefitAmount = $benefit->rate/100 * $applicationDetails->value ?? 0;
                            $html .= '<span style="float: right">'.number_format($benefitAmount,2) .'</span>';
                        }
                    }else{
                        $benefitAmount = $benefit->rate;
                        $html .= '<span style="float: right">'.number_format($benefitAmount,2).'</span>';
                    }
                    $html .= '</p>';
                    $totalBenefits += $benefitAmount;

                }

            }
        }

        if($type == 'attachment'){
            $totalBasicPremium = $basicPremium;
            $totalPremiumPayable = $totalBasicPremium;
            $html .= '</p>';
            $html .= '<hr>';
            $html .= ' <p>Total Premium Payable:  <span style="float: right"><b>'.number_format($totalPremiumPayable,2).'</b></span></p>';

        } elseif($type == 'personalAccident'){
            $totalBasicPremium = $basicPremium;
            $totalPremiumPayable = $totalBasicPremium;
            $html .= '</p>';
            $html .= '<hr>';
            $html .= ' <p>Total Premium Payable:  <span style="float: right"><b>'.number_format($totalPremiumPayable,2).'</b></span></p>';
        } elseif($type == 'health'){

            $totalPremiumPayable = $applicationDetails->premiumPayable;
            $html .= '</p>';
            $html .='<p>Outpatient Basic Premium: <span style="float: right">'.number_format($applicationDetails->op_premium,2).'</span></p>';
            $html .='<p>Dental Basic Premium: <span style="float: right">'.number_format($applicationDetails->dental_premium,2).'</span> </p>';
            $html .='<p>Optical Basic Premium: <span style="float: right">'.number_format($applicationDetails->optical_premium,2).'</span> </p>';
            $html .='<p>Maternity Basic Premium: <span style="float: right">'.number_format($applicationDetails->maternity_premium,2).'</span> </p>';

            $html .= '<hr>';
            $html .= '<p>Total Basic Premium: <span style="float: right">'.number_format($applicationDetails->total_basic_premium,2).'</span></p>';
            $html .= '<p>PHCF (0.25%): <span style="float: right">'.number_format($applicationDetails->phcf,2).'</span></p>';
            $html .= '<p>ITL (0.2%): <span style="float: right">'.number_format($applicationDetails->itl,2).'</span></p>';
            $html .= '<p>Stamp Duty: <span style="float: right">'.number_format($applicationDetails->stamp_duty,2).'</span></p>';
            $html .= '<hr>';
            $html .= ' <p>Total Premium Payable:  <span style="float: right"><b>'.number_format($applicationDetails->premiumPayable,2).'</b></span></p>';
            $html .= '<hr>';
            $html .= '<h3>Optional Benefits Limits</h3>';
            $html .= '<p>Outpatient Limit: <span>'.number_format($applicationDetails->op_limit ?? 0).'</span></p>';
            $html .= '<p>Optical Limit: <span>'.number_format($applicationDetails->optical_limit ?? 0).'</span></p>';
            $html .= '<p>Dental Limit: <span>'.number_format($applicationDetails->dental_limit ?? 0).'</span></p>';
            $html .= '<p>Maternity Limit: <span>'.number_format($applicationDetails->dental_limit ?? 0).'</span></p>';


        }elseif($type == 'lastExpense'){

            /**If there is additional Children, Include the premiums**/
            $additionalChildren = 0;
            if($applicationDetails->childFiveName != null && $applicationDetails->childFiveAge != 0){
                $additionalChildren += 1;
                if($applicationDetails->childSixName != null && $applicationDetails->childSixAge != 0){
                    $additionalChildren += 1;
                }
            }
            /**Only when there is additional Children, show additional Children Section**/
            $additionalChildrenPremium = 0;
            if($additionalChildren > 0){
                $additionalChildrenPremium = $cover->additional_child_premium*$additionalChildren;
                //$html .= '<hr>';
                //$html .= '<p>Additional Children: <span style="float: right">'.$additionalChildren.'</span></p>';
                //$html .= '<p>Premium per Child: <span style="float: right">'.number_format($cover->additional_child_premium,2).'</span></p>';
                $html .= '<p>Additional Premium for <b style="color: red">'.$additionalChildren.'</b> Children: <span style="float: right">'.number_format($additionalChildrenPremium,2).'</span></p>';
            }
            $totalBasicPremium = $totalBenefits + $basicPremium + $additionalChildrenPremium;
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
            $html .= '<hr>';
            $html .= '<p></p>';
            $html .= '<p></p>';
            $html .= '<h3 style="text-align:center">Beneficiaries/Dependants</h3>';
            $html .= '<p>Spouse: <span>'.$applicationDetails->spouseName ?? ''.'</span></p>';
            $childNames = [
                $applicationDetails->childOneName ?? '',
                $applicationDetails->childTwoName ?? '',
                $applicationDetails->childThreeName ?? '', // Add more as needed
                $applicationDetails->childFourName ?? '', // Add more as needed
                $applicationDetails->childFiveName ?? '', // Add more as needed
                $applicationDetails->childSixName ?? '', // Add more as needed
            ];


            $html .= '<p>Children: <span>'.implode(", ", array_filter($childNames)).'</span></p>';
            $parentNames = [
                $applicationDetails->fatherName ?? '',
                $applicationDetails->motherName ?? '',

            ];
            $html .= '<p>Parents: <span>'.implode(", ", array_filter($parentNames)).'</span></p>';
            $inLawNames = [
                $applicationDetails->fatherInLawName ?? '',
                $applicationDetails->motherInLawName ?? '',

            ];
            $html .= '<p>Parents in Law: <span>'.implode(", ", array_filter($inLawNames)).'</span></p>';


            $html .= '<h3 style="text-align:center">Cover Limits</h3>';
            $html .= '<p>Principal Limit: <span>'.number_format($cover->limit ?? 0).'</span></p>';
            $html .= '<p>Spouse Limit: <span>'.number_format($cover->spouse_limit ?? 0).'</span></p>';
            $html .= '<p>Children Limit: <span>'.number_format($cover->child_limit ?? 0).'</span></p>';
            $html .= '<p>Parents Limit: <span>'.number_format($cover->parent_limit ?? 0).'</span></p>';


        }else {
            $totalBasicPremium = $totalBenefits + $basicPremium;
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

        }

        /**Create a Table to carry our Quote Details**/
        $table = "";
        if($type == 'motor'){
            $table = "<table >";
            $table .= "<tr class='table-header' style='background-color: #EC0000;color: white'>";
            $table .= "<th>Vehicle Make</th>";
            $table .= "<th>Year of Manufacture</th>";
            $table .= "<th>Sum Insured</th>";
            $table .= "</tr>";

            $table .= "<tr>";
            $table .= "<td>".$applicationDetails->carMake."</td>";
            $table .= "<td>".$applicationDetails->year."</td>";
            $table .= "<td>".$applicationDetails->value."</td>";
            $table .= "</tr>";

            $table .= "</table>";
        }elseif($type == 'travel'){
            $table = "<table >";
            $table .= "<tr class='table-header' style='background-color: #EC0000;color: white'>";
            $table .= "<th>From</th>";
            $table .= "<th>To</th>";
            $table .= "<th>Days</th>";
            $table .= "<th>Limit</th>";
            $table .= "</tr>";

            $table .= "<tr>";
            $table .= "<td>".$applicationDetails->travelFrom."</td>";
            $table .= "<td>".$applicationDetails->travelTo."</td>";
            $table .= "<td>".$applicationDetails->period."</td>";
            $table .= "<td>".number_format($applicationDetails->limit)."</td>";
            $table .= "</tr>";

            $table .= "</table>";

        }elseif($type == 'health'){
            $table = "<table >";
            $table .= "<tr class='table-header' style='background-color: #EC0000;color: white'>";
            $table .= "<th>Insurance Company</th>";
            $table .= "<th>Inpatient Limit</th>";
            $table .= "<th>Principal Age</th>";
            $table .= "<th>Spouse Age</th>";
            $table .= "<th>Number of Children</th>";
            $table .= "</tr>";

            $table .= "<tr>";
            $table .= "<td>".$applicationDetails->company->name."</td>";
            $table .= "<td>".number_format($applicationDetails->limit->limit)."</td>";
            $table .= "<td>".$applicationDetails->principalAge."</td>";
            $table .= "<td>".$applicationDetails->spouseAge."</td>";
            $table .= "<td>".$applicationDetails->childrenNumber."</td>";
            $table .= "</tr>";

            $table .= "</table>";

            $table .= "<h2>Optional Benefits</h2>";
            $table .= "<table >";
            $table .= "<tr class='table-header' style='background-color: #EC0000;color: white'>";
            $table .= "<th>Outpatient Premium</th>";
            $table .= "<th>Dental Premium</th>";
            $table .= "<th>Optical Premium</th>";
            $table .= "<th>Maternity Premium</th>";
            $table .= "</tr>";

            $table .= "<tr>";
            $table .= "<td>".number_format($applicationDetails->op_premium)."</td>";
            $table .= "<td>".number_format($applicationDetails->dental_premium)."</td>";
            $table .= "<td>".number_format($applicationDetails->optical_premium)."</td>";
            $table .= "<td>".number_format($applicationDetails->maternity_premium)."</td>";
            $table .= "</tr>";

            $table .= "</table>";
        }elseif($type == 'attachment'){
            $table = "<table >";
            $table .= "<tr class='table-header' style='background-color: #EC0000;color: white'>";
            $table .= "<th>Insurance Company</th>";
            $table .= "<th>Duration</th>";
            $table .= "</tr>";

            $table .= "<tr>";
            $table .= "<td>".$applicationDetails->companyName."</td>";
            $table .= "<td>".$applicationDetails->duration."</td>";
            $table .= "</tr>";

            $table .= "</table>";
        }elseif($type == 'personalAccident'){
            $table = "<table >";
            $table .= "<tr class='table-header' style='background-color: #EC0000;color: white'>";
            $table .= "<th>Insurance Company</th>";
            $table .= "<th>Duration</th>";
            $table .= "</tr>";

            $table .= "<tr>";
            $table .= "<td>".$applicationDetails->companyName."</td>";
            $table .= "<td>".$applicationDetails->duration."</td>";
            $table .= "</tr>";

            $table .= "</table>";
        }

        $data = [
            'total' => $totalPremiumPayable,
            'html' => $html,
            'details'=>$details,
            'table' =>$table,
            'applicationDetails'=>$applicationDetails,
            'benefits'=>$applicationBenefits,
            'class' => $class,
            'startDate' => $startDate,
            'phone' => $phone
        ];
        $pdf = PDF::loadView('front.pages.quotations.quotation-pdf', $data);
        return $pdf->stream('quotation.pdf');

    }
}

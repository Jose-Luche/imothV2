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
use App\Models\TravelApplication;
use App\Models\BidBondApplication;
use App\Models\HealthSpousePremium;
use App\Models\HealthPrincipalPremium;
use Illuminate\Support\Facades\Session;
use App\Models\HealthInsuranceApplication;
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
        $html = '<p>Basic Premium: ';
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

            $basicPremium = $principalPremium + $spousePremium + $childrenPremium;
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
            
        } else {
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

<?php

namespace App\Http\Controllers\Admin;

use App\Models\BidBond;
use App\Models\BidBondApplication;
use App\Models\Comprehensive;
use App\Models\CorporateInsuranceApplication;
use App\Models\HealthInsuranceApplication;
use App\Http\Controllers\Controller;
use App\Models\BusinessApplication;
use App\Models\InsuranceCompany;
use App\Models\MotorApplication;
use App\Models\PerformanceBond;
use App\Models\PerformanceBondApplication;
use App\Models\PersonalLiabilityApplication;
use App\Models\ThirdParty;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //Dashboard
    public function dashboard()
    {
        $companies = InsuranceCompany::all();
        $comprehensive = Comprehensive::all();
        $bidBonds = BidBond::all();
        $performanceBond = PerformanceBond::all();
        $thirdParty = ThirdParty::all();

        $bidBondApplications = BidBondApplication::all();
        $comprehensiveApplications = CorporateInsuranceApplication::all();
        $corporateApplication = CorporateInsuranceApplication::all();
        $healthApplications = HealthInsuranceApplication::all();
        $performanceApplications = PerformanceBondApplication::all();
        $personalLiabilityApplications = PersonalLiabilityApplication::all();
        $motorInsuranceApplications = MotorApplication::all();
        $businessInsuranceApplications = BusinessApplication::all();

        for ($x = 6; $x >= 0; $x--) {
            $day = Carbon::now()->subDays($x);
            $bidBondApplications = BidBondApplication::whereDate('created_at',"=", Carbon::now()->subDays($x))->get();
            $comprehensiveApplications = CorporateInsuranceApplication::whereDate('created_at',"=", Carbon::now()->subDays($x))->get();
            $corporateApplication = CorporateInsuranceApplication::whereDate('created_at',"=", Carbon::now()->subDays($x))->get();
            $healthApplications = HealthInsuranceApplication::whereDate('created_at',"=", Carbon::now()->subDays($x))->get();
            $performanceApplications = PerformanceBondApplication::whereDate('created_at',"=", Carbon::now()->subDays($x))->get();
            $personalLiabilityApplications = PersonalLiabilityApplication::whereDate('created_at',"=", Carbon::now()->subDays($x))->get();
            $motorInsuranceApplications = MotorApplication::whereDate('created_at',"=", Carbon::now()->subDays($x))->get();
            $businessInsuranceApplications = BusinessApplication::whereDate('created_at',"=", Carbon::now()->subDays($x))->get();


            $count = $bidBondApplications->count() + $comprehensiveApplications->count() + $corporateApplication->count() + $healthApplications->count() + $performanceApplications->count()
                    + $personalLiabilityApplications->count() + $motorInsuranceApplications->count() + $businessInsuranceApplications->count();
            $data[] = [
                'count'=>$x,
                'date'=>$day->format('d,M Y'),
                'requests' =>$count,
            ];
        }

        return view('admin.dashboard',[
            'companies'=>$companies,
            'comprehensive'=>$comprehensive,
            'bidBonds'=>$bidBonds,
            'performanceBond'=>$performanceBond,
            'thirdParty'=>$thirdParty,

            'bidBondApplications'=>$bidBondApplications,
            'comprehensiveApplications'=>$comprehensiveApplications,
            'corporateApplication'=>$corporateApplication,
            'healthApplications'=>$healthApplications,
            'performanceApplications'=>$performanceApplications,
            'personalLiabilityApplications'=>$personalLiabilityApplications,
            'motorInsuranceApplications'=>$motorInsuranceApplications,
            'businessInsuranceApplications'=>$businessInsuranceApplications,
            'graphData'=>$data
        ]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\LifeInsurance;
use App\Models\HomeApplication;
use App\Models\LifeApplication;
use App\Models\MotorApplication;
use App\Models\BidBondApplication;
use App\Models\BusinessApplication;
use App\Http\Controllers\Controller;
use App\Models\ComprehensiveBenefit;
use App\Models\MotorcircleInsurance;
use App\Models\HealthInsuranceApplication;
use App\Models\PerformanceBondApplication;
use App\Models\PersonalAccidentApplication;
use App\Models\PersonalLiabilityApplication;
use App\Models\CorporateInsuranceApplication;


class RequestsController extends Controller
{
    //Motor
    public function motor()
    {
       if (\Request::has('from') && \Request::has('to')){
           $from = \Request::get('from');
           $to = \Request::get('to');

           $motor = MotorApplication::latest()
               ->whereDate('created_at','>=',Carbon::parse($from))
               ->whereDate('created_at','<=',Carbon::parse($to))
               ->paginate(20);
       }else {
           $motor = MotorApplication::latest()
               ->paginate(20);
       }
        return view('admin.reports.motor.motor',[
            'items'=>$motor
        ]);
    }
    //Details
    public function motorDetails($id)
    {
        $details = MotorApplication::findorfail($id);
        return view('admin.reports.motor.details',[
            'details'=>$details
        ]);
    }

    //Pubf
    public function motorDelete($id)
    {
        $details = MotorApplication::findOrFail($id);

        $delete = $details->delete();

        return redirect()->route('admin.reports.motor')->with('success','Request Deleted successfully,');
    }
    //Motor
    public function motorCircle()
    {
        if (\Request::has('from') && \Request::has('to')) {
            $from = \Request::get('from');
            $to = \Request::get('to');
            $motor = MotorcircleInsurance::whereDate('created_at','>=',Carbon::parse($from))
                ->latest()
                ->whereDate('created_at','<=',Carbon::parse($to))
                ->paginate(20);
        }else{
            $motor = MotorcircleInsurance::paginate(20);
        }

        return view('admin.reports.motor.motorCircle',[
            'items'=>$motor
        ]);
    }
    //Details
    public function motorCircleDetails($id)
    {
        $details = MotorcircleInsurance::findorfail($id);
        return view('admin.reports.motor.motorCircleDetails',[
            'details'=>$details
        ]);
    }

    //Pubf
    public function motorCircleDelete($id)
    {
        $details = MotorcircleInsurance::findOrFail($id);

        $delete = $details->delete();

        return redirect()->route('admin.reports.motorCircle')->with('success','Request Deleted successfully,');
    }
    //Corporate
    public function corporate()
    {
        if (\Request::has('from') && \Request::has('to')) {
            $from = \Request::get('from');
            $to = \Request::get('to');
            $motor = CorporateInsuranceApplication::whereDate('created_at','>=',Carbon::parse($from))
                ->latest()
                ->whereDate('created_at','<=',Carbon::parse($to))
                ->paginate(20);
        }else{
            $motor = CorporateInsuranceApplication::latest()->paginate(20);
        }

        return view('admin.reports.corporate.corporate',[
            'items'=>$motor
        ]);
    }
    //Corporate Details
    public function corporateDetails($id)
    {
        $details = CorporateInsuranceApplication::findorfail($id);
        return view('admin.reports.corporate.details',[
            'details'=>$details
        ]);
    }

    public function corporateDelete($id)
    {
        $details = CorporateInsuranceApplication::findorfail($id);

        $delete = $details->delete();

        return redirect()->route('admin.reports.corporate')->with('success','Request deleted successfully.');

    }
    //Corporate
    public function accidents()
    {
        if (\Request::has('from') && \Request::has('to')) {
            $from = \Request::get('from');
            $to = \Request::get('to');
            $motor = PersonalAccidentApplication::whereDate('created_at','>=',Carbon::parse($from))
                ->whereDate('created_at','<=',Carbon::parse($to))
                ->latest()->paginate(20);
        }else{
            $motor = PersonalAccidentApplication::latest()->paginate(20);
        }

        return view('admin.reports.accidents.accidents',[
            'items'=>$motor
        ]);
    }
    //Corporate Details
    public function accidentDetails($id)
    {
        $details = PersonalAccidentApplication::findorfail($id);
        return view('admin.reports.accidents.details',[
            'details'=>$details
        ]);
    }

    public function accidentDelete($id)
    {
        $details = PersonalAccidentApplication::findorfail($id);

        $delete = $details->delete();

        return redirect()->route('admin.reports.accidents')->with('success','Request deleted successfully.');

    }
    //Corporate
    public function life()
    {
        if (\Request::has('from') && \Request::has('to')) {
            $from = \Request::get('from');
            $to = \Request::get('to');
            $motor = LifeApplication::whereDate('created_at','>=',Carbon::parse($from))
                ->whereDate('created_at','<=',Carbon::parse($to))
                ->latest()->paginate(20);
        }else{
            $motor = LifeApplication::latest()->paginate(20);
        }

        return view('admin.reports.life.life',[
            'items'=>$motor
        ]);
    }
    //Corporate Details
    public function lifeDetails($id)
    {
        $details = LifeApplication::findorfail($id);
        return view('admin.reports.life.details',[
            'details'=>$details
        ]);
    }

    public function lifeDelete($id)
    {
        $details = LifeApplication::findorfail($id);

        $delete = $details->delete();

        return redirect()->route('admin.reports.life')->with('success','Request deleted successfully.');

    }
    //Corporate
    public function health()
    {
        if (\Request::has('from') && \Request::has('to')) {
            $from = \Request::get('from');
            $to = \Request::get('to');
            $motor = HealthInsuranceApplication::whereDate('created_at','>=',Carbon::parse($from))
                ->whereDate('created_at','<=',Carbon::parse($to))
                ->latest()->paginate(20);
        }else{
            $motor = HealthInsuranceApplication::latest()->paginate(20);
        }

        return view('admin.reports.health.health',[
            'items'=>$motor
        ]);
    }
    //Corporate Details
    public function healthDetails($id)
    {
        $details = HealthInsuranceApplication::findorfail($id);
        return view('admin.reports.health.details',[
            'details'=>$details
        ]);
    }

    public function healthDelete($id)
    {
        $details = HealthInsuranceApplication::findorfail($id);

        $delete = $details->delete();

        return redirect()->route('admin.reports.health')->with('success','Request deleted successfully.');

    }
    //Corporate
    public function bidBond()
    {
        if (\Request::has('from') && \Request::has('to')) {
            $from = \Request::get('from');
            $to = \Request::get('to');
            $motor = BidBondApplication::whereDate('created_at','>=',Carbon::parse($from))
                ->whereDate('created_at','<=',Carbon::parse($to))
                ->latest()->paginate(20);
        }else{
            $motor = BidBondApplication::latest()->paginate(20);
        }

        return view('admin.reports.trade.bidBond',[
            'items'=>$motor
        ]);
    }
    //Corporate Details
    public function bidBodDetails($id)
    {
        $details = BidBondApplication::findorfail($id);
        return view('admin.reports.trade.bidBondDetails',[
            'details'=>$details
        ]);
    }

    public function bidBondDelete($id)
    {
        $details = BidBondApplication::findorfail($id);

        $delete = $details->delete();

        return redirect()->route('admin.reports.bidBond')->with('success','Request deleted successfully.');

    }
    //Corporate
    public function performance()
    {
        if (\Request::has('from') && \Request::has('to')) {
            $from = \Request::get('from');
            $to = \Request::get('to');
            $motor = PerformanceBondApplication::whereDate('created_at','>=',Carbon::parse($from))
                ->whereDate('created_at','<=',Carbon::parse($to))
                ->latest()->paginate(20);
        }else{
            $motor = PerformanceBondApplication::latest()->paginate(20);
        }

        return view('admin.reports.trade.performance',[
            'items'=>$motor
        ]);
    }
    //Corporate Details
    public function performanceDetails($id)
    {
        $details = PerformanceBondApplication::findorfail($id);
        return view('admin.reports.trade.performanceDetails',[
            'details'=>$details
        ]);
    }

    public function performanceDelete($id)
    {
        $details = PerformanceBondApplication::findorfail($id);

        $delete = $details->delete();

        return redirect()->route('admin.reports.performance')->with('success','Request deleted successfully.');

    }
    //Corporate
    public function indemnity()
    {
        if (\Request::has('from') && \Request::has('to')) {
            $from = \Request::get('from');
            $to = \Request::get('to');
            $motor = PersonalLiabilityApplication::whereDate('created_at','>=',Carbon::parse($from))
                ->whereDate('created_at','<=',Carbon::parse($to))
                ->latest()->paginate(20);
        }else{
            $motor = PersonalLiabilityApplication::latest()->paginate(20);
        }

        return view('admin.reports.trade.personal',[
            'items'=>$motor
        ]);
    }
    //Corporate Details
    public function indemnityDetails($id)
    {
        $details = PersonalLiabilityApplication::findorfail($id);
        return view('admin.reports.trade.personalDetails',[
            'details'=>$details
        ]);
    }

    public function indemnityDelete($id)
    {
        $details = PersonalLiabilityApplication::findorfail($id);

        $delete = $details->delete();

        return redirect()->route('admin.reports.indemnity')->with('success','Request deleted successfully.');

    }

    public function business()
    {
        if (\Request::has('from') && \Request::has('to')) {
            $from = \Request::get('from');
            $to = \Request::get('to');
            $motor = BusinessApplication::whereDate('created_at','>=',Carbon::parse($from))
                ->whereDate('created_at','<=',Carbon::parse($to))
                ->latest()->paginate(20);
        }else{
            $motor = BusinessApplication::latest()->paginate(20);
        }

        return view('admin.reports.business.business',[
            'items'=>$motor
        ]);
    }
    //Corporate Details
    public function businessDetails($id)
    {
        $details = BusinessApplication::findorfail($id);
        return view('admin.reports.business.details',[
            'details'=>$details
        ]);
    }

    public function businessDelete($id)
    {
        $details = BusinessApplication::findorfail($id);

        $delete = $details->delete();

        return redirect()->route('admin.reports.business')->with('success','Request deleted successfully.');

    }

    public function home()
    {
        if (\Request::has('from') && \Request::has('to')) {
            $from = \Request::get('from');
            $to = \Request::get('to');
            $motor = HomeApplication::whereDate('created_at','>=',Carbon::parse($from))
                ->whereDate('created_at','<=',Carbon::parse($to))
                ->latest()->paginate(20);
        }else{
            $motor = HomeApplication::latest()->paginate(20);
        }

        return view('admin.reports.home.home',[
            'items'=>$motor
        ]);
    }
    //Corporate Details
    public function homeDetails($id)
    {
        $details = HomeApplication::findorfail($id);
        return view('admin.reports.business.details',[
            'details'=>$details
        ]);
    }

    public function homeDelete($id)
    {
        $details = HomeApplication::findorfail($id);

        $delete = $details->delete();

        return redirect()->route('admin.reports.business')->with('success','Request deleted successfully.');

    }

    

}

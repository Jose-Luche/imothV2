<?php

namespace App\Http\Controllers\Front\Insurance;

use App\Http\Controllers\Controller;
use App\Mail\Admin\AdminComprehensive;
use App\Mail\Admin\AdminThirdParty;
use App\Models\Comprehensive;
use App\Models\MotorApplication;
use App\Models\MotorApplicationFile;
use App\Models\Payment;
use App\Models\ThirdParty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ThirdPartyController extends Controller
{
    public function index()
    {
        return view('front.third.index');
    }

    public function submitVehicleDetails(Request $request)
    {

        $request->validate([
            'vehicleUse' => 'required|string',
            'carMake' => 'required|string',
            'policy' => 'required',
            'date' => 'required|date|after:yesterday',
        ]);

        $request->session()->put('type', 1);
        $request->session()->put('value', 0);
        $request->session()->put('policy', $request->input('policy'));
        $request->session()->put('vehicleUse', $request->input('vehicleUse'));
        $request->session()->put('carMake', $request->input('carMake'));
        $request->session()->put('year', 0);
        $request->session()->put('date', $request->input('date'));

        return redirect()->route('front.third.bio');
    }

    public function userBio()
    {
        return view('front.third.bio');
    }

    public function submitBio(Request $request)
    {
        $validatedData = $request->validate([
            'firstName' => 'required|max:255',
            'lastName' => 'required',
            'email' => 'required|email',
            'phoneNumber' => 'required|phone:KE'
        ]);

        $request->session()->put('firstName', $request->input('firstName'));
        $request->session()->put('lastName', $request->input('lastName'));
        $request->session()->put('email', $request->input('email'));
        $request->session()->put('phoneNumber', $request->input('phoneNumber'));

        $create = MotorApplication::create([
            'type' => Session::get('type'),
            'insuranceType' => 2,
            'firstName' => Session::get('firstName'),
            'lastName' => Session::get('lastName'),
            'email' => Session::get('email'),
            'phone' => Session::get('phoneNumber'),
            'value' => Session::get('value'),
            'valued' => 1,
            'vehicleUse' => Session::get('vehicleUse'),
            'carMake' => Session::get('carMake'),
            'year' => Session::get('year'),
            'vehicleType' => Session::get('vehicleType'),
            'date' => Session::get('date'),
            'passengers' => Session::get('passengers'),
            'tonnage' => Session::get('tonnage'),
            'policy' => Session::get('policy')
        ]);
        Mail::to(env('ADMIN_NOTIF_MAIL'))->send(new AdminThirdParty($create, "create"));

        return redirect()->route('front.third.covers', $create->id);
    }

    public function covers($id)
    {
        if (Session::get('firstName') == null or Session::get('phoneNumber') == null) {
            return redirect()->route('front.third.index')
                ->with('error', 'Please 2 fill all the required details.');
        }

        $applicationDetails = MotorApplication::find($id);
        $policy = $applicationDetails->policy;

        $covers = ThirdParty::where('type', $policy)->orderBy('rate', 'ASC')->paginate(10);
        $applicationDetails = MotorApplication::find($id);
        $applicationBenefits = $applicationDetails->benefits;

        /**Premium Workings**/
        $html = "";
        $coverDetails = [];
        foreach($covers as $cover){
            $totalPremium = 0;

            $html = '<p>Sum Insured: <b style="margin-left: 20px">'. number_format($applicationDetails->value).'</b></p>';
            /**Basic Premium Part**/
            $html .= '<p>Basic Premium: ';
            if($cover->rate < 100){
                if(($cover->rate/100 * $applicationDetails->value ?? 0) < ($cover->minRate ?? 0)){
                    $basicPremium = $cover->minRate;
                    $html .= ' <span style="float: right">'.number_format($basicPremium,2).'</span>';
                }else{
                    $basicPremium = $cover->rate/100 * $applicationDetails->value ?? 0;
                    $html .= ' <span style="float: right">'.number_format($basicPremium,2).'</span>';
                }
            }else{
                $basicPremium = $cover->rate;
                $html .= '<span style="float: right">'.number_format($basicPremium,2).'</span>';
            }
            /**Available Benefits Section**/
            $totalBenefits = 0;
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

            $coverDetails[] =[
                'cover' => $cover,
                'html' => $html,
            ];
        }

        return view('front.third.covers', [
            'html' => $html,
            'covers' => $coverDetails,
            'applicationDetails' => $applicationDetails,
            'benefits' => $applicationBenefits
        ]);
    }

    public function coverDetails($applicationId, $id)
    {
        if (Session::get('firstName') == null or Session::get('phoneNumber') == null) {
            return redirect()->route('motor.thirdParty.quotes')
                ->with('error', 'Please 2 fill all the required details.');
        }

        $details = ThirdParty::findOrfail($id);
        $covers = Comprehensive::orderBy('rate', 'ASC')->paginate(10);
        $applicationDetails = MotorApplication::find($applicationId);
        //        $applicationBenefits = $applicationDetails->benefits;

        $updateApplication = $applicationDetails->update([
            'quoteId' => $details->id,
            'value' => $details->rate,
            'amountPayable' => $details->rate
        ]);
        if (!$updateApplication) {
            return back()->with('error', 'An unexpected error occurred please try again.');
        }

        /**Computations**/
        $totalPremium = 0;
        $cover = $details;
        /**Basic Premium Part**/
        $html = '<p>Basic Premium: ';
        if($cover->rate < 100){
            if(($cover->rate/100 * $applicationDetails->value ?? 0) < ($cover->minRate ?? 0)){
                $basicPremium = $cover->minRate;
                $html .= ' <span style="float: right">'.number_format($basicPremium,2).'</span>';
            }else{
                $basicPremium = $cover->rate/100 * $applicationDetails->value ?? 0;
                $html .= ' <span style="float: right">'.number_format($basicPremium,2).'</span>';
            }
        }else{
            $basicPremium = $cover->rate;
            $html .= '<span style="float: right">'.number_format($basicPremium,2).'</span>';
        }
        /**Available Benefits Section**/
        $totalBenefits = 0;
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


        return view('front.third.details', [
            'total' => $totalPremiumPayable,
            'html' => $html,
            'details' => $details,
            'covers' => $covers,
            'applicationDetails' => $applicationDetails,
            'pa' => MotorApplication::find($applicationId)
        ]);
    }

    public function submitApplication($applicationId, $id)
    {
        if (Session::get('firstName') == null or Session::get('phoneNumber') == null) {
            return redirect()->route('motor.thirdParty.quotes')
                ->with('error', 'Please 2 fill all the required details.');
        }
        $coverDetails = ThirdParty::findorfail($id);

        $applicationDetails = MotorApplication::find($applicationId);

        $amountPayable = Session::get('value') * ($coverDetails->rate / 100);


        $finalAmount = $applicationDetails->value;



        $updateApplication = $applicationDetails->update([
            'quoteId' => $id,
            'amountPayable' => $finalAmount,
            'is_complete' => true
        ]);
        if (!$updateApplication) {
            return back()->with('error', 'An unexpected error occurred.Please try again.');
        }


        $message = "Your Third Party insurance application to Insurancemaramoja was successful.We will get back to you shortly.";
        //        sendSms($applicationDetails->phone,$message);
        Mail::to($applicationDetails->email)->send(new \App\Mail\User\ThirdParty($applicationDetails));
        Mail::to(env('ADMIN_NOTIF_MAIL'))->send(new AdminThirdParty($applicationDetails, 'submission'));
        return back()->with('success', 'Application Successful,We will get back to you soon.');
    }

    public function uploadDocuments(Request $request, $id)
    {
        $request->validate([
            'kra'            => 'required|mimes:pdf,docx,image/jpeg,image/png,image/jpg,image/gif,image/svg|max:5000',
            'identification' => 'required|mimes:pdf,docx,image/jpeg,image/png,image/jpg,image/gif,image/svg|max:5000',
            'logbook'        => 'required|mimes:pdf,docx,image/jpeg,image/png,image/jpg,image/gif,image/svg|max:5000',
        ]);
        //
        DB::beginTransaction();
        try {

            $kra = $this->uploadFile($request, 'kra');
            $identification = $this->uploadFile($request, 'identification');
            $logbook = $this->uploadFile($request, 'logbook');

            $create = MotorApplicationFile::create([
                'application_id' => $id,
                'kra' => $kra,
                'identification' => $identification,
                'logbook' => $logbook,
            ]);

            if (!$create) {
                return back()->with('error', 'An unexpected error occurred.Please reload and try again.');
            }

            //ApplicationDetails
            $details = MotorApplication::find($id);

            //Mark application as complete
            $update = $details->update([
                'is_complete' => true,
            ]);

            //Create Payment
            $createPaymentInstance = Payment::create([
                'ref_id' => $details->id,
                'amount' => $details->amountPayable,
                'paid_amount' => 0,
                'type' => Payment::TYPE_THIRDPARTY
            ]);
            DB::commit();

            return redirect()->route('front.third.pay', $id)->with('success', 'Files uploaded successfully.Proceed to pay to complete application');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::critical($e->getMessage());
            return back()->with('error', 'An unexpected error occurred.Please reload and try again');
        }
    }

    private function uploadFile($request, $file)
    {
        //Do the File upload
        $filenamewithextension = $request->file($file)->getClientOriginalName();

        //get filename without extension
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

        //get file extension
        $extension = $request->file($file)->getClientOriginalExtension();

        //filename to store
        $filenametostore = 'applications/' . date('Ymd') . '/' . $file . "/" . time() . '.' . $extension;

        //Upload File to s3
        $storeImage = Storage::disk('public')->put($filenametostore, fopen($request->file($file), 'r+'), 'public');

        //        $fileUrl = $filenametostore;

        return $filenametostore;
    }

    public function pay($applicationId)
    {
        $details = MotorApplication::findOrFail($applicationId);

        $complete = $details->update([
            'is_complete' => true
        ]);


        if (!$complete) {
            dd("An unexpected error occurred.Please try again.");
        }
        $payment = Payment::where('ref_id', $applicationId)
            ->where('type', Payment::TYPE_THIRDPARTY)
            ->first();
        if (!$payment) {
            $payment = Payment::create([
                'ref_id' => $applicationId,
                'amount' => $details->amountPayable,
                'type' => Payment::TYPE_THIRDPARTY,
                'phone' => Session::get('phoneNumber'),
                'paid_amount' => 0
            ]);
        }
        return view("front.third.pay", [
            'applicationDetails' => $details,
            'payment' => $payment
        ]);
    }
}

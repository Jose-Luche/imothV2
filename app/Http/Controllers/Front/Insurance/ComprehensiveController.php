<?php

namespace App\Http\Controllers\Front\Insurance;

use App\Http\Controllers\Controller;
use App\Jobs\GenerateComprehensiveCoverJob;
use App\Mail\Admin\AdminComprehensive;
use App\Models\Comprehensive;
use App\Models\MotorApplication;
use App\Models\MotorApplicationFile;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ComprehensiveController extends Controller
{
    public function index()
    {
        return view('front.comprehensive.index');
    }

    public function submitVehicleDetails(Request $request)
    {

        $request->validate([
            'value' => 'required|numeric',
            'vehicleUse' => 'required|string',
            'carMake' => 'required|string',
            'year' => 'numeric|string',
            'date' => 'required|date|after:yesterday',
        ]);

        $number = (int) filter_var($request->input('value'), FILTER_SANITIZE_NUMBER_INT);

        $request->session()->put('type', 1);
        $request->session()->put('value', $number );
        $request->session()->put('valued', $request->input('valued'));
        $request->session()->put('RegNo', $request->input('RegNo'));
        $request->session()->put('vehicleUse', $request->input('vehicleUse'));
        $request->session()->put('carMake', $request->input('carMake'));
        $request->session()->put('year', $request->input('year'));
        $request->session()->put('date', $request->input('date'));

        return redirect()->route('front.comprehensive.bio');
    }

    public function userBio()
    {
        return view('front.comprehensive.bio');
    }

    public function submitBio(Request $request)
    {

        $validatedData = $request->validate([
            'firstName' => 'required|max:255',
            'lastName' => 'required',
            'email' => 'required|email',
            'phoneNumber'=>'required|phone:KE'
        ]);

        $request->session()->put('firstName', $request->input('firstName'));
        $request->session()->put('lastName', $request->input('lastName'));
        $request->session()->put('email', $request->input('email'));
        $request->session()->put('phoneNumber', $request->input('phoneNumber'));

        $create = MotorApplication::create([
            'type'=>Session::get('type'),
            'insuranceType'=>1,
            'firstName'=>Session::get('firstName'),
            'lastName'=>Session::get('lastName'),
            'email'=>Session::get('email'),
            'phone'=>Session::get('phoneNumber'),
            'value'=>Session::get('value'),
            'RegNo'=>Session::get('RegNo'),
            'valued'=>1,
            'vehicleUse'=>Session::get('vehicleUse'),
            'carMake'=>Session::get('carMake'),
            'year'=>Session::get('year'),
            'vehicleType'=>Session::get('vehicleType'),
            'date'=>Session::get('date'),
            'passengers'=>Session::get('passengers'),
            'tonnage'=>Session::get('tonnage'),
            'policy'=>Session::get('policy')
        ]);
       //Mail::to(env('ADMIN_NOTIF_MAIL'))->send(new AdminComprehensive($create,"application"));

        return redirect()->route('front.comprehensive.covers',$create->id);
    }

    public function covers($id)
    {
        $applicationDetails = MotorApplication::find($id);
        $covers = Comprehensive::where('category', $applicationDetails->vehicleUse)->orderBy('rate','ASC')->paginate(10);
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
        return view('front.comprehensive.covers',[
            'html' => $html,
            'covers'=>$coverDetails,
            'applicationDetails'=>$applicationDetails,
            'benefits'=>$applicationBenefits
        ]);
    }



    public function coverDetails($applicationId,$id)
    {
        if (Session::get('firstName') == null or Session::get('phoneNumber') == null ) {
            return redirect()->route('motor.comprehensive.quotes')
                ->with('error', 'Please 2 fill all the required details.');

        }

        $details = Comprehensive::findOrfail($id);
        $applicationDetails = MotorApplication::find($applicationId);
        $applicationBenefits = $applicationDetails->benefits;



        /**Computations**/
        $totalPremium = 0;
        $cover = $details;
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

        Session::put('totalPremium', $totalPremiumPayable);
        $updateApplication = $applicationDetails->update([
            'quoteId'=>$details->id,
            'amountPayable' => $totalPremiumPayable,
        ]);
        if (!$updateApplication){
            return back()->with('error','An unexpected error occurred please try again.');
        }

        return view('front.comprehensive.details',[
            'total' => $totalPremiumPayable,
            'html' => $html,
            'details'=>$details,
            'applicationDetails'=>$applicationDetails,
            'benefits'=>$applicationBenefits
        ]);
    }

    public function submitApplication($applicationId,$id)
    {
//        if (Session::get('type') == null) {
//            return redirect()->route('motor.comprehensive.quotes')
//                ->with('error', 'Please fill all the required details.');
//        }
        if (Session::get('firstName') == null or Session::get('phoneNumber') == null ) {
            return redirect()->route('motor.comprehensive.quotes')
                ->with('error', 'Please 2 fill all the required details.');
        }

        $coverDetails = Comprehensive::findorfail($id);
        $applicationDetails = MotorApplication::find($applicationId);

        /*$amountPayable = Session::get('value') * ($coverDetails->rate /100);
        if ($amountPayable < $coverDetails->minRate)
        {
            $amount = $coverDetails->minRate;
        }else{
            $amount = $amountPayable;
        }

        //Get benefits
        $total = 0;
        if ($applicationDetails->benefits()->exists()) {
            foreach ($applicationDetails->benefits as $benefit) {
                $rate = $benefit->details->rate;
                $minPrice = $benefit->details->price;

                $total += (Session::get('value') * ($rate/100)) < $minPrice ? $minPrice : (Session::get('value') * ($rate/100));
            }
        }

        $finalAmount = $amount + $total;*/

        $finalAmount = Session::get('totalPremium');

        $updateApplication = $applicationDetails->update([
            'quoteId'=>$id,
            'amountPayable'=> round($finalAmount)
        ]);
        if (!$updateApplication){
            return back()->with('error','An unexpected error occurred.Please try again.');
        }

        $createPaymentInstance = Payment::create([
            'ref_id'=>$applicationDetails->id,
            'amount'=>$finalAmount,
            'paid_amount'=>0,
            'type'=>Payment::TYPE_COMPREHENSIVE,
            'phone' => $applicationDetails->phone,
        ]);


       // GenerateComprehensiveCoverJob::dispatch($applicationDetails,$createPaymentInstance);
//        $this->generateAndSendCover($applicationDetails,$createPaymentInstance);

//        return view('insurance.comprehensive',['details'=>$applicationDetails,'payment'=>$createPaymentInstance]);
//
//        dd("Here");
//        Mail::to(env('ADMIN_NOTIF_MAIL'))->send(new AdminComprehensive($applicationDetails,'submission'));

        //$message = "Your Comprehensive insurance application to Insurancemaramoja was successful.We will get back to you shortly.";
  //sendSms($applicationDetails->phone,$message);

        $type = "paynow";
        if ($type === 'paynow'){
            return redirect()->route('front.comprehensive.pay',$applicationId)->with('success','Request received.Pay now to complete request.');
        }

        return back()->with('success','Your application was saved successfully.We will get in contact with you as soon as possible.');
    }


    public function uploadDocuments(Request $request,$id)
    {
        $request->validate([
            'kra'            => 'required|mimes:pdf,docx,jpeg,bmp,png,gif,svg,jpeg|max:5000',
            'identification' => 'required|mimes:pdf,docx,jpeg,bmp,png,gif,svg,jpeg|max:5000',
            'logbook'        => 'required|mimes:pdf,docx,jpeg,bmp,png,gif,svg,jpeg|max:5000',
        ]);






//
        DB::beginTransaction();
        try {

            /*$documentUpload = new MotorApplicationFile;
            $documentUpload->application_id = $id;
            $documentUpload->kra = $request->kra;
            $documentUpload->identification = $request->identification;
            $documentUpload->logbook = $request->logbook;

            if ($request->file('kra')) {
                $file = $request->file('kra');
                //@unlink(public_path('upload/company/' . $company->logo));
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/kra'), $filename);
                $documentUpload['kra'] = $filename;
            }elseif ($request->file('identification')) {
                $file = $request->file('identification');
                //@unlink(public_path('upload/company/' . $company->logo));
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/identification'), $filename);
                $documentUpload['identification'] = $filename;
            }else {
                $file = $request->file('logbook');
                //@unlink(public_path('upload/company/' . $company->logo));
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/logbook'), $filename);
                $documentUpload['logbook'] = $filename;
            }

            $documentUpload->save();*/

            $kra = $this->uploadFile($request, 'kra');
            $identification = $this->uploadFile($request, 'identification');
            $logbook= $this->uploadFile($request, 'logbook');

            $create = MotorApplicationFile::create([
                'application_id'=>$id,
                'kra'=>$kra,
                'identification'=>$identification,
                'logbook'=>$logbook
            ]);

            if (!$create){
                return back()->with('error','An unexpected error occurred.Please reload and try again.');
            }

            //ApplicationDetails
            $details = MotorApplication::find($id);

            //Mark application as complete
            $update = $details->update([
                'is_complete'=>true,
            ]);

            $coverDetails = Comprehensive::findorfail($details->quoteId);
            $amountPayable = Session::get('value') * ($details->rate /100);
            if ($amountPayable < $coverDetails->minRate)
            {
                $amount = $coverDetails->minRate;
            }else{
                $amount = $amountPayable;
            }

            $total = 0;
            if ($details->benefits()->exists()) {
                foreach ($details->benefits as $benefit) {
                    $rate = $benefit->details->rate;
                    $minPrice = $benefit->details->price;

                    $total += (Session::get('value') * ($rate/100)) < $minPrice ? $minPrice : (Session::get('value') * ($rate/100));
                }
            }

            $finalAmount = $amount + $total;

            //Create Payment
            $createPaymentInstance = Payment::create([
                'ref_id'=>$details->id,
                'amount'=>$finalAmount,
                'paid_amount'=>0,
                'type'=>Payment::TYPE_COMPREHENSIVE,
                'phone' => $details->phone,
            ]);

//            $this->generateAndSendCover($details,$createPaymentInstance);
            GenerateComprehensiveCoverJob::dispatch($details,$createPaymentInstance);

            DB::commit();

            return redirect()->route('front.comprehensive.pay',$id)->with('success','Files uploaded successfully.Proceed to pay to complete application');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::critical($e->getMessage());
            return back()->with('error', 'An unexpected error occurred.Please reload and try again');
        }
    }

    /*private function uploadFile($request,$file)
    {

        //TODO add image Morph for records
        $filenamewithextension = $request->file($file)->getClientOriginalName();

        //get filename without extension
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

        //get file extension
        $extension = $request->file($file)->getClientOriginalExtension();

        //filename to store
        $filenametostore = 'applications/'.date('Ymd').'/'.$file."/".uniqid().'.'.$extension;

        //Upload File to s3
        $storeImage = Storage::disk('public')->put($filenametostore, fopen($request->file($file), 'r+'), 'public');

//        $fileUrl = $filenametostore;

        return $filenametostore;
    }*/

    public function pay($applicationId)
    {
        $details = MotorApplication::findOrFail($applicationId);
        $payment = Payment::where('ref_id',$applicationId)
            ->where('type',Payment::TYPE_COMPREHENSIVE)
            ->first();
        if (!$payment) {
            $payment = Payment::create([
                'ref_id' => $applicationId,
                'amount' => $details->amountPayable,
                'type' => Payment::TYPE_BIDBOND,
                'phone' => Session::get('phoneNumber'),
                'paid_amount' => 0
            ]);
        }
        return view("front.comprehensive.pay",[
            'applicationDetails'=>$details,
            'payment'=>$payment
        ]);
    }


}

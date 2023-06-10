<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\MpesaTransaction;
use App\Models\Payment;
use App\Models\PaymentTracking;
use App\Models\StkPushRequest;
use Carbon\Carbon;
use http\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Validator;

class PaymentController extends Controller
{
    //c2b callback
    public function c2b(Request $request)
    {
//        $data = $request->all();

        info($request->all());

        $data = json_decode($request->getContent());


        info($data->TransID);

        //1.Create Transaction with Type 1.
        //i.Get Users Wallet Id
        $savePayment = MpesaTransaction::create([
            'TransactionType'   => $data->TransactionType,
            'TransID'           => $data->TransID,
            'TransTime'         => Carbon::parse($data->TransTime),
            'TransAmount'       => $data->TransAmount,
            'BusinessShortCode' => $data->BusinessShortCode,
            'BillRefNumber'     => $data->BillRefNumber,
            'InvoiceNumber'     => $data->InvoiceNumber,
            'OrgAccountBalance' => $data->OrgAccountBalance,
            'ThirdPartyTransID' => $data->ThirdPartyTransID,
            'MSISDN'            => $data->MSISDN,
            'FirstName'         => $data->FirstName,
            'MiddleName'        => $data->MiddleName,
            'LastName'          => $data->LastName,
        ]);
        if (!$savePayment) {
            Log::info("Payment Received");
            return response()->json([
                'response'=>true,
                'error'=>"Error saving payment"
            ],201);
        }else{
            $this->handlePayment($data->BillRefNumber,$data->TransAmount,$savePayment->id);

            Log::info('Payment Not received');
            return response()->json([
                'response'=>true,
                'error'=>"Payment saved successfully."
            ],200);
        }
    }
    //Handle transactions i.e to mpesa and all that
    public function handlePayment($invoiceId,$amount,$transactionId)
    {
        //Payment details
        $details = Payment::where('reference',$invoiceId)->first();
        if (!$details){
            //Update the transaction as unclaimed.
            MpesaTransaction::where('id',$transactionId)->first()->update([
                'unclaimed'=>true
            ]);
        }else{
            //Check the payment amount and compare with the payment amount
            $amountPayable= $details->amount;
            $paidAmount = $details->paid_amount;

            $amountPending = $amountPayable - $paidAmount;

            $newPaidAmount = $amount + $paidAmount;

            //Record the transaction/payment
            $updatePayment = $details->update([
                'paid_amount'=>$newPaidAmount,
                'status'=>$amountPayable <= $newPaidAmount ? Payment::STATUS_PAID : Payment::STATUS_PROGRESS
            ]);

            //Save payment history
            $paymentTracking = PaymentTracking::create([
                'expected_payment_id'=>$details->id,
                'amount'=>$amount,
                'mpesa_transaction_id'=>$transactionId
            ]);
            if (!$paymentTracking){
                Log::critical("Error creating tracking for payment.");
            }
            if (!$updatePayment){
                Log::critical("Payment failed.");
            }
        }
    }
    //Stk Push Call Back
    public function stkCallback(Request $request)
    {
        $data = $request->all();
        $checkoutRequestId = $data['Body']['stkCallback']['CheckoutRequestID'];
        $resultCode = $data['Body']['stkCallback']['ResultCode'];
        $resultDesc = $data['Body']['stkCallback']['ResultDesc'];

        if ($resultCode == 0)
        {
            Log::info('STK SUCCESS '.$checkoutRequestId);
            try {

                $updateStkPushStatus =StkPushRequest::where('CheckoutRequestID',$checkoutRequestId)
                    ->update([
                        'status'=>true,
                        'results_desc'=>$resultDesc,
                        //                        'ResultCode'=>$resultCode
                    ]);

                return response()->json([
                    'response'=>true,
                    'message'=>"Stk callback received successfully."
                ],200);


            }  catch (\Exception $exception){
                Log::warning("Error:".$exception->getMessage());
                return response()->json([
                    'response'=>false,
                    'error'=>$exception->getMessage()
                ],400);
            }
        }else
        {
            //Update The stk push request to false.
            Log::info('STK Failed '.$checkoutRequestId);
            $update = StkPushRequest::where('CheckoutRequestID',$checkoutRequestId)->update([
                'results_desc'=>$resultDesc,
                'ResultCode'=>$resultCode
            ]);
        }
    }
    /**
     * Lipa na M-PESA password
     * */
    public function lipaNaMpesaPassword()
    {
        info(env('MPESA_PASSKEY'));
        $lipa_time = Carbon::rawParse('now')->format('YmdHms');
        $passkey = env('MPESA_PASSKEY');
        $BusinessShortCode = env('MPESA_SHORT_CODE');
        $timestamp =$lipa_time;
        $lipa_na_mpesa_password = base64_encode($BusinessShortCode.$passkey.$timestamp);

        return $lipa_na_mpesa_password;

    }

    public function customerMpesaSTKPush(Request $request)
    {
        info("Stk request starting.");
        $messages = [
            'phone.min' => 'Please enter your phone number in the format 25471234567'
        ];
        $validator = Validator::make($request->all(), [
            'phone'   => 'required|min:12|numeric',
            'invoice' => 'required|required',
            'amount'  => 'required|numeric'
        ], $messages);
        if ($validator->fails()) {
            return response()->json([
                'response' => false,
                'message'  => $validator->errors()->first()
            ]);
        }

        $phone = formatPhone($request->phone);
        $invoiceId = $request->invoice;
        $amount = $request->amount;

        info("Phone : ".$phone." Invoice : ".$invoiceId." Amount : ".$amount);

        $url = env('MPESA_BASE_URL') . '/mpesa/stkpush/v1/processrequest';


        $paymentDetails = Payment::where('reference', $invoiceId)->first();

        if (!$paymentDetails) {
            return [
                'success' => false,
                'message' => 'An unexpected error occurred.Please reload the page and try again.'
            ];
        }

        $headers = [
            'Authorization' => 'Bearer ' . $this->generateAccessToken(),
            'Content-Type'  => 'application/json',
            'Accept'        => 'application/json'
        ];

        $body = [
            'BusinessShortCode' => env('MPESA_SHORT_CODE'),
            'Password'          => $this->lipaNaMpesaPassword(),
            'Timestamp'         => Carbon::rawParse('now')->format('YmdHms'),
            'TransactionType'   => 'CustomerPayBillOnline',
            'Amount'            => $amount,
            'PartyA'            => $phone, // replace this with your phone number
            'PartyB'            => env('MPESA_SHORT_CODE'),
            'PhoneNumber'       => $phone, // replace this with your phone number
            'CallBackURL'       => env('MPESA_CALLBACK_BASE_URL') . '/api/stk/callback',
            'AccountReference'  => $invoiceId,
            'TransactionDesc'   => $invoiceId
        ];

        info($body);

        $stkPushRequest = Http::withHeaders($headers)->post($url,$body);

        $data = $stkPushRequest->json();

        info($data);


        $storeRequest = StkPushRequest::create([
            'phone'             => $phone,
            'amount'            => $amount,
            'payment_id'        => $paymentDetails->id,
            'MerchantRequestID' => $data['MerchantRequestID'],
            'CheckoutRequestID' => $data['CheckoutRequestID']
        ]);
        if (!$storeRequest) {
            return [
                'success' => false,
                'message' => 'An unexpected error occurred.Please reload the page and try again.'
            ];
        }
        return [
            'success' => true,
            'message' => 'Request sent successfully. Enter your m-pesa pin to complete the process.'
        ];

    }

    // Test stk push functionality
    public function customerMpesaSTKPushOld(Request $request)
    {

        info("Stk request starting.");
        $messages = [
            'phone.min' => 'Please enter your phone number in the format 25471234567'
        ];
        $validator = Validator::make($request->all(), [
            'phone'   => 'required|min:12|numeric',
            'invoice' => 'required|required',
            'amount'  => 'required|numeric'
        ], $messages);
        if ($validator->fails()) {
            return response()->json([
                'response' => false,
                'message'  => $validator->errors()->first()
            ]);
        }

        $phone = $request->phone;
        $invoiceId = $request->invoice;
        $amount = $request->amount;


        $url = env('MPESA_BASE_URL') . '/mpesa/stkpush/v1/processrequest';


        $paymentDetails = Payment::where('reference', $invoiceId)->first();

        if (!$paymentDetails) {
            return [
                'success' => false,
                'message' => 'An unexpected error occurred.Please reload the page and try again.'
            ];
        }

        $stkPush = new \GuzzleHttp\Client();

        $stkPushResponse = $stkPush->post($url, [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->generateAccessToken(),
                'Content-Type'  => 'application/json',
                'Accept'        => 'application/json'
            ],
            'json'    => [
                'BusinessShortCode' => env('MPESA_SHORT_CODE'),
                'Password'          => $this->lipaNaMpesaPassword(),
                'Timestamp'         => Carbon::rawParse('now')->format('YmdHms'),
                'TransactionType'   => 'CustomerPayBillOnline',
                'Amount'            => $amount,
                'PartyA'            => $phone, // replace this with your phone number
                'PartyB'            => env('MPESA_SHORT_CODE'),
                'PhoneNumber'       => $phone, // replace this with your phone number
                'CallBackURL'       => env('MPESA_CALLBACK_BASE_URL') . '/api/stk/callback',
                'AccountReference'  => $invoiceId,
                'TransactionDesc'   => $invoiceId
            ],
        ]);

        info($stkPushResponse->getBody());

        info("Status Code : " . $stkPushResponse->getStatusCode());

        $data = json_decode((string)$stkPushResponse->getBody(), true);


        $storeRequest = StkPushRequest::create([
            'phone'             => $phone,
            'amount'            => $amount,
            'payment_id'        => $paymentDetails->id,
            'MerchantRequestID' => $data['MerchantRequestID'],
            'CheckoutRequestID' => $data['CheckoutRequestID']
        ]);
        if (!$storeRequest) {
            return [
                'success' => false,
                'message' => 'An unexpected error occurred.Please reload the page and try again.'
            ];
        }
        return [
            'success' => true,
            'message' => 'Request sent successfully. Enter your m-pesa pin to complete the process.'
        ];
    }
    /**
     * Lipa na M-PESA STK Push method
     * */
    public function stkPushTest()
    {


        $phone = '254705758788';
        $invoiceId = '110';
        $amount = '5';


        $url = env('MPESA_BASE_URL') . '/mpesa/stkpush/v1/processrequest';


//        $paymentDetails = Payment::where('reference', $invoiceId)->first();
//
//        if (!$paymentDetails) {
//            return [
//                'success' => false,
//                'message' => 'An unexpected error occurred.Please reload the page and try again.'
//            ];
//        }

        $headers = [
            'Authorization' => 'Bearer ' . $this->generateAccessToken(),
            'Content-Type'  => 'application/json',
            'Accept'        => 'application/json'
        ];

        $body = [
            'BusinessShortCode' => env('MPESA_SHORT_CODE'),
            'Password'          => $this->lipaNaMpesaPassword(),
            'Timestamp'         => Carbon::rawParse('now')->format('YmdHms'),
            'TransactionType'   => 'CustomerPayBillOnline',
            'Amount'            => $amount,
            'PartyA'            => $phone, // replace this with your phone number
            'PartyB'            => env('MPESA_SHORT_CODE'),
            'PhoneNumber'       => $phone, // replace this with your phone number
            'CallBackURL'       => env('MPESA_CALLBACK_BASE_URL') . '/api/stk/callback',
            'AccountReference'  => $invoiceId,
            'TransactionDesc'   => $invoiceId
        ];

        $stkPushRequest = Http::withHeaders($headers)->post($url,$body);


        dd($stkPushRequest->body());
        dd("hERE DUDE");
        $data = json_decode((string)$stkPushResponse->getBody(), true);


        $storeRequest = StkPushRequest::create([
            'phone'             => $phone,
            'amount'            => $amount,
            'payment_id'        => $paymentDetails->id,
            'MerchantRequestID' => $data['MerchantRequestID'],
            'CheckoutRequestID' => $data['CheckoutRequestID']
        ]);
        if (!$storeRequest) {
            return [
                'success' => false,
                'message' => 'An unexpected error occurred.Please reload the page and try again.'
            ];
        }
        return [
            'success' => true,
            'message' => 'Request sent successfully. Enter your m-pesa pin to complete the process.'
        ];
    }

    public function checkPayment(Request $request)
    {
        $messages = [
            'invoice.required'=>'Please reload the page and try again.'
        ];
        $validator = Validator::make($request->all(), [
            'invoice' => 'required|required',
        ], $messages);
        if ($validator->fails()) {
            return response()->json([
                'response' => false,
                'message'  => $validator->errors()->first()
            ]);
        }
        $invoiceId = $request->invoice;

        $paymentDetails = Payment::where('reference',$invoiceId)->first();
        if (!$paymentDetails){
            return [
                'success'=>false,
                'message'=>'An unexpected error occurred.Please reload the page'
            ];
        }

        //Check status
        if ($paymentDetails->status == Payment::STATUS_PAID){
            return [
                'success'=>true,
                "pay_id"=>$paymentDetails->id,
                'message'=>'Payment received successfully.You will be contacted by one of out team soon.'
            ];
        }elseif($paymentDetails->status == Payment::STATUS_PROGRESS){
            return [
                'success' => false,
                'message' => 'Payment in progress. Received amount : Ksh '.number_format($paymentDetails->paid_amount)." Pending balance : Ksh ".number_format($paymentDetails->amount - $paymentDetails->paid_amount)
            ];
        }else {
            return [
                'success' => false,
                'message' => 'Please pay to complete the process.'
            ];
        }
    }

    public function generateAccessToken()
    {
        $consumer_key=env('MPESA_CONSUMER_KEY');
        $consumer_secret=env('MPESA_CONSUMER_SECRET');
        $credentials = base64_encode($consumer_key.":".$consumer_secret);
        $url = env('MPESA_BASE_URL')."/oauth/v1/generate?grant_type=client_credentials";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: Basic ".$credentials));
        curl_setopt($curl, CURLOPT_HEADER,false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $curl_response = curl_exec($curl);
        $access_token=json_decode($curl_response);
        return $access_token->access_token;
    }

    /**
     * J-son Response to M-pesa API feedback - Success or Failure
     */
    public function createValidationResponse($result_code, $result_description){
        $result=json_encode(["ResultCode"=>$result_code, "ResultDesc"=>$result_description]);
        $response = new Response();
        $response->headers->set("Content-Type","application/json; charset=utf-8");
        $response->setContent($result);
        return $response;
    }
    /**
     *  M-pesa Validation Method
     * Safaricom will only call your validation if you have requested by writing an official letter to them
     */
    public function mpesaValidation(Request $request)
    {
        $result_code = "0";
        $result_description = "Accepted validation request.";
        return $this->createValidationResponse($result_code, $result_description);
    }
    /**
     * M-pesa Transaction confirmation method, we save the transaction in our databases
     */
    public function mpesaConfirmation(Request $request)
    {
        $content=json_decode($request->getContent());

        $mpesa_transaction = new MpesaTransaction();
        $mpesa_transaction->TransactionType = $content->TransactionType;
        $mpesa_transaction->TransID = $content->TransID;
        $mpesa_transaction->TransTime = $content->TransTime;
        $mpesa_transaction->TransAmount = $content->TransAmount;
        $mpesa_transaction->BusinessShortCode = $content->BusinessShortCode;
        $mpesa_transaction->BillRefNumber = $content->BillRefNumber;
        $mpesa_transaction->InvoiceNumber = $content->InvoiceNumber;
        $mpesa_transaction->OrgAccountBalance = $content->OrgAccountBalance;
        $mpesa_transaction->ThirdPartyTransID = $content->ThirdPartyTransID;
        $mpesa_transaction->MSISDN = $content->MSISDN;
        $mpesa_transaction->FirstName = $content->FirstName;
        $mpesa_transaction->MiddleName = $content->MiddleName;
        $mpesa_transaction->LastName = $content->LastName;
        $mpesa_transaction->save();
        // Responding to the confirmation request
        $response = new Response();
        $response->headers->set("Content-Type","text/xml; charset=utf-8");
        $response->setContent(json_encode(["C2BPaymentConfirmationResult"=>"Success"]));

        $this->handlePayment($content->BusinessShortCode,$content->TransAmount,$mpesa_transaction->id);

        return $response;
    }

    /**
     * M-pesa Register Validation and Confirmation method
     */
    public function mpesaRegisterUrls()
    {

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, env('MPESA_BASE_URL').'/mpesa/c2b/v1/registerurl');
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization: Bearer '. $this->generateAccessToken()));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode(array(
            'ShortCode' => env('MPESA_SHORT_CODE'),
            'ResponseType' => 'Completed',
            'ConfirmationURL' => env('MPESA_CALLBACK_BASE_URL')."/api/c2b/confirmation",
            'ValidationURL' => env('MPESA_CALLBACK_BASE_URL')."/api/c2b/validation"
        )));
        $curl_response = curl_exec($curl);
        echo $curl_response;
    }


    //Payment success page
    public function paymentSuccess($id)
    {
        $paymentDetails = Payment::find($id);

        return view('front.pay.success',[
            'details'=>$paymentDetails
        ]);
    }
}

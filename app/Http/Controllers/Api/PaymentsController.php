<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MpesaTransaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentsController extends Controller
{
    public function c2b(Request $request)
    {
        $data = $request->all();

        //1.Create Transaction with Type 1.
        //i.Get Users Wallet Id
        $savePayment = MpesaTransaction::create([
            'TransactionType'   => $data['TransactionType'],
            'TransID'           => $data['TransID'],
            'TransTime'         => Carbon::parse($data['TransTime']),
            'TransAmount'       => $data['TransAmount'],
            'BusinessShortCode' => $data['BusinessShortCode'],
            'BillRefNumber'     => $data['BillRefNumber'],
            'InvoiceNumber'     => $data['InvoiceNumber'],
            'OrgAccountBalance' => $data['OrgAccountBalance'],
            'ThirdPartyTransID' => $data['ThirdPartyTransID'],
            'MSISDN'            => $data['MSISDN'],
            'FirstName'         => $data['FirstName'],
            'MiddleName'        => $data['MiddleName'],
            'LastName'          => $data['LastName'],
        ]);
        if (!$savePayment) {
            Log::info("Payment Received");
            return response()->json([
                'response'=>true,
                'error'=>"Error saving payment"
            ],201);
        }else{
            $this->resolvePayment($data['TransAmount'],$data['BillRefNumber']);

            Log::info('Payment Not received');
            return response()->json([
                'response'=>true,
                'error'=>"Payment saved successfully."
            ],200);
        }
    }


    private function resolvePayment($amount,$reference){

    }

    public function stk(Request $request)
    {
        $data = $request->all();

        Log::info($data);
    }
}

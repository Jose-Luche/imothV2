<?php

namespace App\Http\Controllers\Payment;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class PaystackController extends Controller
{
    public function callback(Request $request)
    {
        $reference = $request->query('reference'); // Get reference from URL
        if (!$reference) {
            return redirect()->route('cancel')->with('error', 'Invalid transaction reference.');
        }

        $secret_key = env('PAYSTACK_SECRET_KEY');
        $response = Http::withHeaders([
            'Authorization' => "Bearer $secret_key",
            'Cache-Control' => 'no-cache',
        ])->get("https://api.paystack.co/transaction/verify/{$reference}");

        $responseData = $response->json();

        if (!$responseData || !isset($responseData['data']) || $responseData['data']['status'] !== 'success') {
            return redirect()->route('cancel')->with('error', 'Transaction failed or invalid.');
        }

        // Extract metadata safely
        $meta_data = $responseData['data']['metadata']['custom_fields'] ?? [];
        $product_name = $meta_data[0]['value'] ?? 'Unknown';
        $quantity = $meta_data[1]['value'] ?? 1;


        // Save Payment Record
        Payment::create([
            'ref_id' => $product_name,
            'paystack_ref' => $reference,
            //'quantity' => $quantity,
            'amount' => $responseData['data']['amount'] / 100,
            'paid_amount' => $responseData['data']['amount'] / 100,
            //'currency' => $responseData['data']['currency'],
            'status' => 'Completed',
            'type' => 'Paystack',
        ]);

        return redirect()->back()->with('success', 'Payment successful!');
    }


    public function success()
    {
        return "Payment is successful";
    }

    public function cancel()
    {
        return "Payment is cancelled";
    }
}

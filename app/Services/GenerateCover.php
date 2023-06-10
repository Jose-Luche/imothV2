<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class GenerateCover
{
    public function generateComprehensiveCover($details,$paymentDetails)
    {
        $pdf = \PDF::loadView('insurance.comprehensive', ['details' => $details, 'payment' => $paymentDetails])
            ->setPaper('a4','landscape')
            ->setOptions(['defaultFont' => 'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true,]);
        $filenametostore = 'insurance/covers/'.$paymentDetails->reference.'-'.time().'.pdf';

        $storeImage = Storage::disk('public')->put($filenametostore,$pdf->output(), 'public');
//        $storeImage = Storage::disk('public')->put($filenametostore, fopen($request->file($file), 'r+'), 'public');
        $fileUrl = public_path('uploads/'.$filenametostore);

        $storeUrl = $details->update([
            'cover_url'=>$filenametostore
        ]);

        Log::critical("Generated and now trying to send email");

        Mail::to($details->email)->send(new \App\Mail\User\Comprehensive($details,$fileUrl));
    }
}

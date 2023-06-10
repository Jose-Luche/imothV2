<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PdfTestController extends Controller
{
    public function pdf()
    {

//        $pdf = \PDF::loadView('pdf.pdf')
//            ->setPaper('a4')
//            ->setOptions(['defaultFont' => 'sans-serif']);
//        return $pdf->download(uniqid().'.pdf');


        $pdf = \PDF::loadView('pdf.pdf')
            ->setPaper('a4','landscape')
            ->setOptions(['defaultFont' => 'sans-serif']);

        $filenametostore = 'insurance/covers/'.time().'.pdf';

        $storeImage = Storage::disk('public')->put($filenametostore, $pdf->output(), 'public');

        $fileUrl = asset($filenametostore);

        dd($fileUrl);


        return view('pdf.pdf');
        $pdf = Pdf::loadView('pdf.pdf')->setOptions(['defaultFont' => 'sans-serif']);;

        return $pdf->download('itsolutionstuff.pdf');
    }
}

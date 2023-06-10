<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MpesaTransaction;
use App\Services\Mpesa;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    public function payments(Request $request)
    {
        if (\Request::has('from') && \Request::has('to')) {
            $from = \Request::get('from');
            $to = \Request::get('to');
            $payments = MpesaTransaction::whereDate('created_at','>=',Carbon::parse($from))
                ->whereDate('created_at','<=',Carbon::parse($to))
                ->latest()->paginate(20);
        }else{
            $payments = MpesaTransaction::latest()->paginate(30);
        }


        return view('admin.payments.list',[
            'payments'=>$payments
        ]);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentTracking extends Model
{
    protected $fillable = [
        'expected_payment_id',
        'amount',
        'mpesa_transaction_id'
    ];
}

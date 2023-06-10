<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StkPushRequest extends Model
{
    const STATUS_NEW = 1;
    const STATUS_SUCCESS = 2;

    protected $fillable = [
        'payment_id',
        'phone',
        'amount',
        'MerchantRequestID',
        'CheckoutRequestID',
        'status',
        'results_desc',
        'ResultCode'
    ];
}

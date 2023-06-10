<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentList extends Model
{
    protected $fillable = [
        'payment_id',
        'amount',
        'balance_after',
        'ref_id'
    ];
}

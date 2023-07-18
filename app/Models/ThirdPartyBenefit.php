<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThirdPartyBenefit extends Model
{
    //Protected
    protected $fillable = [
        'partyId',
        'name',
        'price',
        'rate',
        'type',
        'isExcess'
    ];
}

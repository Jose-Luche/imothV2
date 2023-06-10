<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LifeInsurance extends Model
{
    //Protected
    protected $fillable = [
        'name',
        'ageBracket',
        'location',
        'amount',
        'email',
        'phone',
        'type'
    ];
}

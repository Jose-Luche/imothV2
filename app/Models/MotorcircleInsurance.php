<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MotorcircleInsurance extends Model
{
    protected $fillable = [
        'insuranceType',
        'firstName',
        'lastName',
        'email',
        'phone',
        'bikeUse',
        'value',
        'location'
    ];
}

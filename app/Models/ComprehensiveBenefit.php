<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComprehensiveBenefit extends Model
{
    //Protected
    protected $fillable = [
        'compId',
        'isMandatory',
        'name',
        'price',
        'rate',
        'type',
        'isExcess'
    ];
}

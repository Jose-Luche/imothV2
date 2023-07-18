<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InsuranceCompany extends Model
{
    use SoftDeletes;
    //Protected
    protected $fillable = [
        'name',
        'logo',
        'location',
        'details'
    ];
}

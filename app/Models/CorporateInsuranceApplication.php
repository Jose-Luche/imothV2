<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CorporateInsuranceApplication extends Model
{
    //Protected
    protected $fillable = [
        'firstName',
        'lastName',
        'phone',
        'email',
        'location',
        'companyName',
        'message',
        'type',
        'quoteId'
    ];
}

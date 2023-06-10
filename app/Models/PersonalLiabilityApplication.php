<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonalLiabilityApplication extends Model
{
    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'phone',
        'startDate',
        'duration',
        'profession',
        'amount'
    ];
}

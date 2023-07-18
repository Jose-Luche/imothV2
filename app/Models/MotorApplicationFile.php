<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MotorApplicationFile extends Model
{
    protected $fillable = [
        'application_id',
        'kra',
        'identification',
        'logbook'
    ];
}

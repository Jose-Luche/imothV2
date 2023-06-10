<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [
        'firstName',
        'midName',
        'lastName',
        'email',
        'phone',
        'avatar',
        'gender'
    ];

    public function authDetails()
    {
        return $this->hasOne('App\Models\User','refId');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CallBackRequest extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'message',
        'read'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttachmentBenefit extends Model
{
    protected $fillable = [
        'partyId',
        'name',
        'price',
        'rate',
        'type',
    ];
}

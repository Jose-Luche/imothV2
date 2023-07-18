<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    //Protected
    protected $fillable = [
        'companyId',
        'premium',
        'limit',
        'details'
    ];
    public function company()
    {
        return $this->belongsTo(InsuranceCompany::class,'companyId');
    }
}

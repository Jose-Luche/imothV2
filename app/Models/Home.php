<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    //Protected
    protected $fillable = [
        'companyId',
        'rate',
        'minRate',
        'details'
    ];
    public function company()
    {
        return $this->belongsTo(InsuranceCompany::class,'companyId');
    }
}

<?php

namespace App\Models;

use App\Models\InsuranceCompany;
use Illuminate\Database\Eloquent\Model;

class PerformanceBond extends Model
{
    //Protected
    protected $fillable = [
        'companyId',
        'rate',
        'details'
    ];
    public function company()
    {
        return $this->belongsTo(InsuranceCompany::class,'companyId');
    }
}

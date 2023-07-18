<?php

namespace App\Models;

use App\Models\ComprehensiveBenefit;
use App\Models\InsuranceCompany;
use Illuminate\Database\Eloquent\Model;

class Comprehensive extends Model
{
    //Protected
    protected $fillable = [
        'companyId',
        'category',
        'rate',
        'minRate',
        'minYear',
        'details'
    ];
    public function company()
    {
        return $this->belongsTo(InsuranceCompany::class,'companyId');
    }
    public function benefits()
    {
        return $this->hasMany(ComprehensiveBenefit::class,'compId', 'companyId');
    }
}

<?php

namespace App\Models;

use App\Models\InsuranceCompany;
use App\Models\ThirdPartyBenefit;
use Illuminate\Database\Eloquent\Model;

class ThirdParty extends Model
{
    //Protected
    protected $fillable = [
        'companyId',
        'rate',
        'category',
        'minRate',
        'minYear',
        'type',
        'details'
    ];
    public function company()
    {
        return $this->belongsTo(InsuranceCompany::class,'companyId');
    }
    public function benefits()
    {
        return $this->hasMany(ThirdPartyBenefit::class,'partyId', 'companyId');
    }

}

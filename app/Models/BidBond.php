<?php

namespace App\Models;

use App\Models\InsuranceCompany;
use Illuminate\Database\Eloquent\Model;

class BidBond extends Model
{
    protected $fillable = [
        'companyId',
        'rate',
        'details',
        'minRate'
    ];
    public function company()
    {
        return $this->belongsTo(InsuranceCompany::class,'companyId');
    }
}

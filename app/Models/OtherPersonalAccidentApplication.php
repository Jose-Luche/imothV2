<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OtherPersonalAccidentApplication extends Model
{
    protected $guarded = ['id'];
    public function company()
    {
        return $this->belongsTo(InsuranceCompany::class,'companyId');
    }
}

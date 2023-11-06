<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LastExpense extends Model
{
    //Protected
    protected $guarded = ['id'];

    public function company()
    {
        return $this->belongsTo(InsuranceCompany::class,'companyId');
    }
}

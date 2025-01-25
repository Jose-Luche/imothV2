<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeniorsMedicalInsuranceApplication extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function company()
    {
        return $this->belongsTo(InsuranceCompany::class, 'companyId');
    }

    public function limit(){
        return $this->belongsTo(Health::class, 'limitId');
    }
}

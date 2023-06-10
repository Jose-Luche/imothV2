<?php

namespace App\Models;

use App\Models\AttachmentBenefit;
use App\Models\InsuranceCompany;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    //Protected
    protected $guarded = ['id'];
    public function company()
    {
        return $this->belongsTo(InsuranceCompany::class,'companyId');
    }
    public function benefits()
    {
        return $this->hasMany(AttachmentBenefit::class,'partyId');
    }
}

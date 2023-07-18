<?php

namespace App\Models;

use App\Models\Comprehensive;
use App\Models\MotorApplicationBenefit;
use App\Models\MotorApplicationFile;
use App\Models\Payment;
use App\Models\ThirdParty;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\AbstractList;

class MotorApplication extends Model
{
    //Protected Fillable
    protected $fillable = [
        'type',
        'insuranceType',
        'firstName',
        'lastName',
        'email',
        'phone',
        'value',
        'valued',
        'vehicleUse',
        'carMake',
        'year',
        'date',
        'RegNo',
        'vehicleType',
        'passengers',
        'tonnage',
        'policy',
        'quoteId',
        'amountPayable',
        'is_complete',
        'cover_url'
    ];
    public function comprehensiveDetails()
    {
        return $this->belongsTo(Comprehensive::class,'quoteId');
    }
    public function thirdPartyDetails()
    {
        return $this->belongsTo(ThirdParty::class,'quoteId');
    }

    public function benefits()
    {
        return $this->hasMany(MotorApplicationBenefit::class,'application_id');
    }

    public function files()
    {
        return $this->hasOne(MotorApplicationFile::class,'application_id');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class,'ref_id')
            ->whereIn('type',[Payment::TYPE_COMPREHENSIVE,Payment::TYPE_THIRDPARTY]);
    }
}

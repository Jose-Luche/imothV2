<?php

namespace App\Models;

use App\Models\Attachment;
use Illuminate\Database\Eloquent\Model;

class PersonalAccidentApplication extends Model
{
    //Protected
    protected $fillable = [
        'firstName',
        'lastName',
        'phone',
        'email',
        'startDate',
        'duration',
        'companyName',
        'children',
        'childrenAges',
        'idNumber',
        'spouseName',
        'spouseAge',
        'insurance_id',
        'amount_payable',
        'type',
        'complete'
    ];

    public function quoteDetails()
    {
        return $this->belongsTo(Attachment::class,'insurance_id');
    }
}

<?php

namespace App\Models;

use App\Models\BidBond;
use Illuminate\Database\Eloquent\Model;

class BidBondApplication extends Model
{
    //Proteceted Fillable
    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'phone',
        'quoteId',
        'company',
        'tenderNo',
        'physicalAddress',
        'tenderName',
        'bondValue',
        'period',
        'commencementDate',
        'description',
        'endDate',
        'contractPrice',
        'expectedValue',
        'advertisingCompany',
        'address'
    ];
    public function quoteDetails()
    {
        return $this->belongsTo(BidBond::class,'quoteId');
    }
}

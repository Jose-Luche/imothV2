<?php

namespace App\Models;

use App\Models\PerformanceBond;
use Illuminate\Database\Eloquent\Model;

class PerformanceBondApplication extends Model
{
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
        'expectedValue'
    ];
    public function quoteDetails()
    {
        return $this->belongsTo(PerformanceBond::class,'quoteId');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationClause extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'compId',
        'product',
        'class',
        'clauses',
    ];

    /**An Entry is for a Specific Insurance Company**/
    public function insurer(){
        return $this->belongsTo(InsuranceCompany::class, 'compId');
    }

}

<?php

namespace App\Models;

use App\Models\ComprehensiveBenefit;
use Illuminate\Database\Eloquent\Model;

class MotorApplicationBenefit extends Model
{
    protected $fillable = [
        'application_id',
        'benefit_id'
    ];

    public function details()
    {
        return $this->belongsTo(ComprehensiveBenefit::class,'benefit_id');
    }
}

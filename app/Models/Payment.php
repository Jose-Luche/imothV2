<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    const TYPE_COMPREHENSIVE = 'comprehensive';
    const TYPE_THIRDPARTY = 'thirdparty';
    const TYPE_BIDBOND = 'bidbond';
    const TYPE_ATTACHMENT = 'attachment';

    const STATUS_NEW = 'new';
    const STATUS_PROGRESS = 'progress';
    const STATUS_PAID = 'paid';

    protected $fillable = [
        'reference',
        'ref_id',
        'amount',
        'paid_amount',
        'type',
        'phone',
        'status'
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($model){
            $model->update([
                'reference'=>'IN'.str_pad($model->getKey(),5,'0',STR_PAD_LEFT)
            ]);
        });
    }
}

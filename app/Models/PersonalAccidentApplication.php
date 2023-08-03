<?php

namespace App\Models;

use App\Models\Attachment;
use Illuminate\Database\Eloquent\Model;

class PersonalAccidentApplication extends Model
{
    //Protected
    protected $guarded = ['id'];
        
    

    public function quoteDetails()
    {
        return $this->belongsTo(Attachment::class,'insurance_id');
    }
}

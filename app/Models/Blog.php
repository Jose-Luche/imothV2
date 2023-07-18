<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'image',
        'slug',
        'content',
        'userId',
        'status'
    ];
    public function admin()
    {
        return $this->belongsTo('App\Models\Admin','userId');
    }
}

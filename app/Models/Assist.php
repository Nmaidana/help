<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assist extends Model
{
    protected $fillable = [
        'heritage',
        'id_user',
        'date',
        'id_state',
        'id_category',

    ];


    protected $dates = [
        'date',
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];
    protected $with = ['category','statuses'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/assists/'.$this->getKey());
    }

    public function category()
    {
        return $this->hasOne(Category::class,'id','id_category');
    }

    public function statuses()
    {
        return $this->hasOne(DetailAssist::class,'id_assist','id')->latest();
    }


}

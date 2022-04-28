<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailAssist extends Model
{
    protected $fillable = [
        'id_assist',
        'id_user',
        'id_state',
        'solution',
        'date',

    ];


    protected $dates = [
        'date',
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];
    protected $with = ['state'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/detail-assists/'.$this->getKey());
    }

    public function state()
    {
        return $this->hasOne(State::class,'id','id_state');
    }
}

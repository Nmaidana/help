<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailHelp extends Model
{
    protected $fillable = [
        'help_id',
        'user_id',
        'state_id',
        'solution',
        'date',
        'category_id',

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
        return url('/admin/detail-helps/'.$this->getKey());
    }

    public function state()
    {
        return $this->belongsTo('App\Models\State');

    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }




}

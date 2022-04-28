<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Help extends Model
{
    protected $fillable = [
        'ci',
        'name',
        'user',
        'dependency',
        'fone',
        'problem',
        'id_dependency'

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];
    protected $with = ['statuses'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/helps/'.$this->getKey());
    }

    public function statuses()
    {
        return $this->hasOne(DetailHelp::class)->latest();
    }


}

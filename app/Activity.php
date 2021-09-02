<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function admin()
    {
        return $this->belongsTo('App\Admin');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}

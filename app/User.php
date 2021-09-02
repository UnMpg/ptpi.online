<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function topics()
    {
        return $this->hasMany('App\Topic');
    }
}

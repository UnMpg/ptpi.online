<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function news()
    {
        return $this->hasMany('App\News');
    }

    public function articles()
    {
        return $this->hasMany('App\Article');
    }

    public function activities()
    {
        return $this->hasMany('App\Activity');
    }
}

<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Participant extends Authenticatable
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function certificates()
    {
        return $this->belongsToMany('App\Certificate')->withPivot('download', 'order');
    }
}

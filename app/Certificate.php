<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    
    public function participants()
    {
        return $this->belongsToMany('App\Participant');
    }
}

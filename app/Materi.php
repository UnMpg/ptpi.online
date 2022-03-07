<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $table = 'materi_seminar_workshop';

    public function certificate()
    {
        return $this->belongsTo('App\Certificate');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'materi';

    public function certificate()
    {
        return $this->hasOne('App\Certificate');
    }
}

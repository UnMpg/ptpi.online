<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LaporanKeuangan extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'laporan_keuangan';
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}

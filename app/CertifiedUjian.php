<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class CertifiedUjian extends Authenticatable
{
    protected $table ="certified_ujian";
    protected $guarded = [];
}

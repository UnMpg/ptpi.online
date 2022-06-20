<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class CertifiedMember extends Authenticatable
{
    protected $table ="certified_members";
    protected $guarded = [];
}

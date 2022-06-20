<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationKoordinat extends Model
{
    protected $table ="location_center";
    protected $guarded = [];
    use HasFactory;
}

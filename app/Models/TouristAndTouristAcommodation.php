<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TouristAndTouristAcommodation extends Model
{
    protected $table = 'tourist_and_tourist_acommodation';

    protected $fillable = [
        'id', 'tourist', 'tourist_acommodation'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TouristAcommodation extends Model
{
    protected $table = 'tourist_acommodation';

    protected $fillable = [
        'id', 'name', 'address', 'phone', 'email','fax','website','room','min_price','max_price','type'
    ];
}

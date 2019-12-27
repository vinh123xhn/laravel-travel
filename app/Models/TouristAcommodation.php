<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TouristAcommodation extends Model
{
    protected $table = 'tourist_acommodation';

    protected $fillable = [
        'id', 'code', 'name', 'address', 'phone', 'email','fax','website','room','min_price','max_price','type','image'
    ];

    public function tourist () {
        return $this->hasMany('App\Models\TouristAndTouristAcommodation', 'tourist_acommodation', 'id');
    }
}

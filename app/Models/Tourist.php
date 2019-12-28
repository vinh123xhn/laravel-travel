<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tourist extends Model
{
    protected $table = 'tourists';

    protected $fillable = [
        'id', 'code', 'name', 'gender', 'birthday', 'address', 'phone', 'email', 'cmt', 'type'
    ];

    public function tourist_and_tourist_acommodations () {
        return $this->hasMany('App\Models\TouristAndTouristAcommodation', 'tourist', 'id');
    }
}

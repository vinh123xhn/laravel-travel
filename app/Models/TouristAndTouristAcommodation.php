<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TouristAndTouristAcommodation extends Model
{
    protected $table = 'tourist_and_tourist_acommodation';

    protected $fillable = [
        'id', 'tourist', 'tourist_acommodation', 'start_date', 'end_date', 'room'
    ];

    public function tourist () {
        return $this->belongsTo('App\Models\Tourist', 'tourist');
    }

    public function tourist_acommodation () {
        return $this->belongsTo('App\Models\TouristAcommodation', 'tourist_acommodation');
    }
}

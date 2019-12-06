<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Relics extends Model
{
    protected $table = 'relics';

    protected $fillable = [
        'id', 'code', 'name', 'image', 'relics_level', 'category', 'num_of_recognition_decisions', 'year_of_recognition','status','age','subtitle','detection_process','management_unit','celebrity','location','event','document'
    ];
}

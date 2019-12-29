<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Crafts extends Model
{
    protected $table = 'crafts';

    protected $fillable = [
        'id', 'code', 'name', 'image', 'category', 'anniversary','subtitle' ,'year_of_recognition', 'type','type_of_crafts_village','concrete','qualification','number_of','status', 'management_unit', 'celebrity', 'location', 'event', 'document'
    ];
}

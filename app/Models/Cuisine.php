<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuisine extends Model
{
    protected $table = 'cuisines';

    protected $fillable = [
        'id', 'code', 'name','cook','material', 'image', 'category','subtitle','taste', 'type', 'kind_of_dish', 'health', 'season', 'ingredient', 'place', 'use', 'management_unit', 'celebrity', 'location', 'event', 'space', 'music', 'costume', 'ceremony'
    ];
}

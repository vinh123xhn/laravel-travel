<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Art extends Model
{
    protected $table = 'arts';

    protected $fillable = [
        'id', 'code', 'name', 'image', 'category', 'subtitle', 'level_1', 'level_2', 'status', 'management_unit', 'celebrity', 'location', 'event', 'content','document'
    ];
}

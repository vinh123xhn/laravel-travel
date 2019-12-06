<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Festival extends Model
{
    protected $table = 'festivals';

    protected $fillable = [
        'id', 'code', 'name', 'image', 'festival_level', 'organizational_level', 'calendar_type', 'frequency', 'day', 'start_date', 'end_date', 'subtitle', 'status', 'category', 'characteristics', 'nation', 'religion', 'management_unit', 'celebrity', 'location', 'event', 'document'
    ];
}

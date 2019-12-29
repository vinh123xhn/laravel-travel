<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Costume extends Model
{
    protected $table = 'costumes';

    protected $fillable = [
        'id', 'code', 'name', 'image','subtitle','age', 'material', 'category', 'nation', 'religion','status','purpose', 'management_unit', 'celebrity', 'location', 'event', 'document'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tourist extends Model
{
    protected $table = 'tourists';

    protected $fillable = [
        'id', 'name', 'gender', 'birthday', 'address', 'phone', 'email', 'type'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Art extends Model
{
    protected $table = 'arts';

    protected $fillable = [
        'id', 'code', 'name', 'image', 'category', 'subtitle', 'level_1', 'level_2', 'status', 'management_unit', 'celebrity', 'location', 'event', 'content','document'
    ];

    public function art_1() {
        return $this->hasMany('App\Models\Art')->where('category', '=', 1);
    }

    public function art_2() {
        return $this->hasMany('App\Models\Art')->where('category', '=', 2);
    }

    public function art_3() {
        return $this->hasMany('App\Models\Art')->where('category', '=', 3);
    }

    public function art_4() {
        return $this->hasMany('App\Models\Art')->where('category', '=', 4);
    }

    public function art_5() {
        return $this->hasMany('App\Models\Art')->where('category', '=', 5);
    }

    public function art_6() {
        return $this->hasMany('App\Models\Art')->where('category', '=', 6);
    }

    public function art_7() {
        return $this->hasMany('App\Models\Art')->where('category', '=', 7);
    }

    public function art_8() {
        return $this->hasMany('App\Models\Art')->where('category', '=', 8);
    }

    public function art_9() {
        return $this->hasMany('App\Models\Art')->where('category', '=', 9);
    }

    public function art_10() {
        return $this->hasMany('App\Models\Art')->where('category', '=', 10);
    }

    public function art_11() {
        return $this->hasMany('App\Models\Art')->where('category', '=', 11);
    }

    public function art_12() {
        return $this->hasMany('App\Models\Art')->where('category', '=', 12);
    }

}

<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class MailTemplate extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','subject','content','variable'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
    ];
}

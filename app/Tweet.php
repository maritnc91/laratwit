<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $fillable = [
        'id',
        'content',
        'user_id',
        'json_raw',
    ];

    protected $hidden = [
        'json_raw',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

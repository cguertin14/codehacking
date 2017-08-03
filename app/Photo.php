<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'password','remember_token','file'
    ];

    public function role() {
        return $this->belongsTo('App\Role');
    }

    public function photo() {
        return $this->belongsTo('App\Photo');
    }
}

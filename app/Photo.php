<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'password','remember_token','file'
    ];

    protected $uploads = '/images/';

    public function role() {
        return $this->belongsTo('App\Role');
    }

    public function photo() {
        return $this->belongsTo('App\Photo');
    }

    public function post() {
        return $this->belongsTo('App\Post');
    }

    public function getFileAttribute($photo) {
        return $this->uploads . $photo;
    }
}

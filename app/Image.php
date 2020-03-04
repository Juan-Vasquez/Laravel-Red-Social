<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';

    public function Coments(){
        return $this->hasMany('App\Coment');
    }

    public function Likes(){
        return $this->hasMany('App\Like');
    }

    public function User(){
        return $this->belongsTo('App\User', 'fk_users');
    }
}

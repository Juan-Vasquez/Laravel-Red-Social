<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';

    public function Coment(){
        return $this->hasMany('App\Coment', 'fk_images')->orderBy('id', 'desc');
    }

    public function Like(){
        return $this->hasMany('App\Like', 'fk_images');
    }

    public function User(){
        return $this->belongsTo('App\User', 'fk_users');
    }

}

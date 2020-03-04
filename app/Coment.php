<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coment extends Model
{
    protected $table = 'coments';

    public function user(){
        return $this->belongsTo('App\User', 'fk_users');
    }

    public function Images(){
        return $this->belongsTo('App\Image', 'fk_images');
    }
}

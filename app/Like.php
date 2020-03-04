<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $tables = 'likes';

    public function Images(){
        return $this->belongsTo('App\Image', 'fk_images');
    }

    public function Users(){
        return $this->belongsTo('App\User', 'fk_users ');
    }
}

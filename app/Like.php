<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $tables = 'likes';

    public function Image(){
        return $this->belongsTo('App\Image', 'fk_images');
    }

    public function User(){
        return $this->belongsTo('App\User', 'fk_users ');
    }
}

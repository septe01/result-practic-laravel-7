<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Albums extends Model
{
    public function photos() //relasi to album
    {
        return $this->hasMany('App\Galeries', 'id_album', 'id');
    }
}

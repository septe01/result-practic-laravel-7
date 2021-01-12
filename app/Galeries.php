<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeries extends Model
{
    //

    public function albums() //relasi to album
    {
        return $this->belongsTo('App\Albums', 'id_album', 'id');
    }

    public function users() //relasi to user
    {
        return $this->belongsTo('App\User', 'id_user', 'id');
    }
}

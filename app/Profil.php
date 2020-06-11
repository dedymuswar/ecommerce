<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    public function User()
    {
        return $this->belongsTo('App\User');
    }

    public function Province()
    {
        return $this->belongsTo('App\Province');
    }

    public function City()
    {
        return $this->belongsTo('App\City');
    }

}

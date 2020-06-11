<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $guarded = [];

    public function profil()
    {
        return $this->hasOne('App\Profil');
    }
}

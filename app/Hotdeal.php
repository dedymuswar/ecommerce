<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotdeal extends Model
{
    
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}

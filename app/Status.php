<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = ['title, percent'];
    
    public function Orders()
    {
        return $this->hasMany('App\Order');
    }
}

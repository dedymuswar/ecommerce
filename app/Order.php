<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'billing_email', 'billing_phone', 'billing_name', 'billing_address', 'provinces_id', 'cities_id',
        'billing_discount_code', 'billing_discount', 'billing_subtotal', 'billing_ongkir', 'billing_total', 'error',
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product')->withPivot('quantity');
    }
}

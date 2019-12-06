<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function presentPrice()
    {
        return money_format('Rp%i', $this->price);
    }

    public function oldPrice()
    {
        return money_format('Rp%i', $this->old_price);
    }

    public function scopeMightAlsoLike($query)
    {
        return $query->inRandomOrder()->take(8);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}

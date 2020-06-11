<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Searchable;
    protected $fillable = ['quantity'];


    public function presentPrice()
    {
        return money_format('Rp %i ', $this->price);
    }

    public function oldPrice()
    {
        return money_format('Rp %i  ', $this->old_price);
    }

    public function scopeMightAlsoLike($query)
    {
        return $query->inRandomOrder()->take(8);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_product');
    }

    public function Orders()
    {
        return $this->belongsToMany('App\Order','order_product')->withPivot('quantity');
    }

    public function hotdeal()
    {
        return $this->hasMany('App\Hotdeal');
    }
}

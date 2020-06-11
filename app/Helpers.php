<?php

use App\Category;
use App\Courier;
use App\Product;
use App\Province;
use Gloudemans\Shoppingcart\Facades\Cart;

function priceFormat($price)
{
    return money_format('Rp%i', $price / 100);
}

// function rupiahFormat($price)
// {
//     // return "Rp ".number_format($price, 2);
//     return money_format('Rp %i ', $price);
// }

function hargaFormat($price)
{
    return "Rp".number_format($price, 2);
    // return money_format('Rp %i ', $price);
}

function setActiveCategory($category, $output = 'active')
{
    return request()->category == $category ? $output : '';
}

function cropedImage($image, $thumb)
{
    $img = '.' . pathinfo('storage/' . $image, PATHINFO_EXTENSION);
    $imgName = str_replace($img, '', $image);

    if ($thumb == "croped") {
        return $img = $imgName . '-cropped' . $img;
    } elseif ($thumb == "medium") {
        return $img = $imgName . '-medium' . $img;
    } elseif ($thumb == "small") {
        return $img = $imgName . '-small' . $img;
    } else {
        return $img = $imgName . $img;
    }
}

function getNumbers()
{
    $tax = config('cart.tax') / 100;
    $discount = session()->get('coupon')['discount'] ?? 0;
    $code = session()->get('coupon')['name'] ?? null;
    $cart2 = str_replace(",", "", Cart::subtotal());
    $subtotal = str_replace(',00', '', number_format($cart2, 2, ',', ''));
    $newTotal = ($subtotal - $discount);
    // cek jika new total bernilai negatif
    if ($newTotal < 0) {
        $newTotal = 0;
    }
    $couriers = Courier::pluck('title', 'code');
    $provinces = Province::pluck('title', 'province_id');

    return collect([
        'tax'   => $tax,
        'discount'  => $discount,
        'code'      =>  $code,
        'subtotal'  =>  $subtotal,
        'newTotal'  =>  $newTotal,
        'couriers'  =>  $couriers,
        'provinces' =>  $provinces


    ]);
}

function getStockLevel($quantity)
{
    if ($quantity > setting('site.stock_threshold')) {
        $stockLevel = '<div class="badge badge-success">In Stock</div>';
    } elseif ($quantity <= setting('site.stock_threshold') && $quantity > 0) {
        $stockLevel = '<div class="badge badge-warning text-white">Low Stock</div>';
    } else {
        $stockLevel = '<div class="badge badge-danger">Not available</div>';
    }

    return $stockLevel;
}

function productthumb($productImages)
{
    if($productImages){
        $image = json_decode($productImages, true) ;
        $output = array_slice($image, -0, 2);
    }

    return $output;
}

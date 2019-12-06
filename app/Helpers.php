<?php

use App\Product;

function priceFormat($price)
{
    return money_format('Rp%i', $price / 100);
}

function rupiahFormat($price)
{
    return money_format('Rp%i', $price);
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

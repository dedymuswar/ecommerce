<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


use App\Http\Controllers\LandingPageController;

Route::get('/', 'LandingPageController@index');

// SHOP
Route::resource('shop', 'ShopController');

//CART
Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');
Route::post('cart/switchtowishlist/{product}', 'CartController@switchtowishlist')->name('cart.switchtowishlist');

//WISHLIST
Route::delete('wishlist/{product}', 'WishlistController@destroy')->name('wishlist.destroy');
Route::post('wishlist/switchtocart/{product}', 'WishlistController@switchtocart')->name('wishlist.switchtocart');
Route::post('cart/addToWishlist/{product}', 'CartController@addToWishlist')->name('cart.addtowishlist');
Route::get('cart/wishlist', 'CartController@wishlist')->name('wishlist.index');
Route::resource('cart', 'CartController');

//CHECKOUT
Route::post('checkout/store', 'CheckoutController@store')->name('checkout.store');
Route::get('checkout/thankyou', 'CheckoutController@thankyou')->name('checkout.thankyou');
Route::resource('checkout', 'CheckoutController')->middleware('auth');

Route::get('empty', function () {
    Cart::instance('saveForLater')->destroy();
});

Route::get('/detail', function () {
    return view('web.page.detail');
});

//ONGKIR
Route::get('/ongkir', 'LandingPageController@ongkir')->name('ongkir.index');
Route::get('/province/{id}/cities', 'LandingPageController@getCities');
Route::post('ongkir/submit', 'LandingPageController@submit')->name('ongkir.submit');

//COUPONS
Route::post('coupon', 'CouponsController@store')->name('coupon.store');
Route::delete('coupon', 'CouponsController@destroy')->name('coupon.destroy');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

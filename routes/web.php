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

//PROFIL
Route::group(['middleware' => ['cekAuthUser']], function () {
    Route::get('alamat', 'ProfileController@alamat')->name('user.alamat');
    Route::get('profile/create', 'ProfileController@create')->name('profil.create');
    Route::post('profile/store', 'ProfileController@store')->name('profil.store');
    Route::get('profile', 'ProfileController@profil')->name('user.profilku');
    Route::put('profile/update/{id}', 'ProfileController@update')->name('profil.update');
    Route::post('profile/dinamis', 'ProfileController@dinamis')->name('profil.dinamis');

    // MENU PESANAN
    Route::get('pesanan', 'PesananController@index')->name('pesanan.show');

    //CHECKOUT
    Route::post('checkout/store', 'CheckoutController@store')->name('checkout.store');
    Route::post('checkout/submitOrder', 'CheckoutController@submitOrder')->name('checkout.submitOrder');
    Route::resource('checkout', 'CheckoutController')->middleware('auth');
    Route::post('ongkir/cekOngkir', 'CheckoutController@cekOngkir')->name('ongkir.cekOngkir');
    Route::get('checkout/received/{id}', 'CheckoutController@received')->name('checkout.received');

    //COUPONS
    Route::post('coupon', 'CouponsController@store')->name('coupon.store');
    Route::delete('coupon', 'CouponsController@destroy')->name('coupon.destroy');
});

// socilite laravel login
Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

// LANDING PAGE
Route::get('/', 'LandingPageController@index');

//BLOG PAGE
Route::get('/blog', 'BlogController@showAllPost')->name('show.blog');
Route::get('blog/{slug}', ['as' => 'blog.post', 'uses' => 'BlogController@artikel'])->where('slug', '[\w\d\-\_]+');

//PRODUCT
Route::get('getProductById/{id}/detail', 'ProductController@produkDetail')->name('detail.produk');

//SEARCH
Route::get('/search', 'ShopController@search')->name('search');

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


//ONGKIR
Route::get('/ongkir', 'LandingPageController@ongkir')->name('ongkir.index');
Route::get('/province/{id}/cities', 'LandingPageController@getCities');
Route::post('ongkir/submit', 'LandingPageController@submit')->name('ongkir.submit');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

// Mail
Route::get('/mailable', function () {
    $order = App\Order::find(123);

    return new App\Mail\OrderPlaced($order);
});


// PAYMENT MIDTRANS
Route::post('payments/notification', 'PaymentController@notification');
Route::get('payments/completed', 'PaymentController@completed');
Route::get('payments/failed', 'PaymentController@failed');
Route::get('payments/unfinish', 'PaymentController@unfinish');

<?php

namespace App\Http\Controllers;

use Validator;
use App\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('web.page.cart')->with([
            'couriers'  => getNumbers()->get('couriers'),
            'provinces' => getNumbers()->get('provinces'),
            'discount' => getNumbers()->get('discount'),
            'newTax' => getNumbers()->get('newTax'),
            'newTotal' => getNumbers()->get('newTotal'),
        ]);
    }

    public function wishlist()
    {
        return view('web.page.wishlist');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });
        $productItem = Product::where('id', $request->id)->first();
        if($productItem->quantity == 0){
            return redirect()->route('cart.index')->with('error_message', 'maaf stok barang'.$productItem->name.' habis, silahkan pilih barang lain!');
        }
        if ($duplicates->isNotEmpty()) {
            return redirect()->route('cart.index')->with('success_message', 'Item Sudah ada di keranjang anda!');
        }
        Cart::add($request->id, $request->name, 1, $request->price)->associate('App\Product');
        Cart::setGlobalTax(0);
        return redirect()->route('cart.index')->with('success_message', 'Item telah ditambahkan dikeranjang anda!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'quantity'  =>  'required|numeric|between:1,5'
        ]);

        if ($validator->fails()) {
            session()->flash('errors', collect(['Quantity must be between 1 and 5.']));
            return response()->json(['success' => false], 400);
        }

        if ($request->quantity > $request->productQuantity) {
            session()->flash('errors', collect(['We currently do not have enough items in stock.']));
            return response()->json(['success' => false], 400);
        }

        Cart::update($id, $request->quantity);
        session()->flash('success_message', 'Quantity was updated successfully!');
        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);
        return back()->with('success_message', 'item telah dihapus dari keranjang anda!');
    }

    public function switchtowishlist($id)
    {
        $item = Cart::get($id);
        Cart::remove($id);

        $duplicates = Cart::instance('saveForLater')->search(function ($cartItem, $rowId) use ($id) {
            return $rowId === $id;
        });
        if ($duplicates->isNotEmpty()) {
            return redirect()->route('cart.index')->with('success_message', 'Item is already in your wishlist!');
        }

        Cart::instance('saveForLater')->add($item->id, $item->name, 1, $item->price)->associate('App\Product');
        return redirect()->route('cart.index')->with('success_message', 'Item has been Save to Wishlist');
    }

    public function addToWishlist(Request $request)
    {
        $duplicates = Cart::instance('default')->search(function ($cartItem, $rowId) use ($request) {
            return $rowId === $request->id;
        });
        if ($duplicates->isNotEmpty()) {
            return redirect()->route('wishlist.index')->with('success_message', 'Item is already in your cart!');
        }

        Cart::instance('saveForLater')->add($request->id, $request->name, 1, $request->price)->associate('App\Product');
        return redirect()->route('wishlist.index')->with('success_message', 'Item has been Save to Wishlist');
    }
}

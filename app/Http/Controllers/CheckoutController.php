<?php

namespace App\Http\Controllers;

use App\City;
use App\Courier;
use App\Order;
use App\OrderProduct;
use App\Province;
use Kavist\RajaOngkir\Facades\RajaOngkir;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderPlace;
use Validator;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tax = config('cart.tax') / 100;
        $discount = session()->get('coupon')['discount'] ?? 0;
        $cart2 = str_replace(",", "", Cart::subtotal());
        $subtotal = str_replace(',00', '', number_format($cart2, 2, ',', ''));
        $newTotal = ($subtotal - $discount);
        // dd($discount);

        $couriers = Courier::pluck('title', 'code');
        $provinces = Province::pluck('title', 'province_id');

        return view('web.page.checkout', compact('couriers', 'provinces', 'discount', 'newTax', 'newTotal'));
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

        if ($request->ajax()) {
            $rules = array(
                'phone.*'    =>  'required',
                'name.*'     =>  'required',
                'address.*'  =>  'required'
            );
            $error = Validator::make($request->all(), $rules);
            if ($error->fails()) {
                return response()->json([
                    'error'  =>  $error->errors()->all()
                ]);
            }
            //Insert to orders table
            $order = Order::create([
                'user_id'               =>  auth()->user() ? auth()->user()->id : null,
                'billing_email'         =>  $request->email,
                'billing_phone'         =>  $request->phone,
                'billing_name'          =>  $request->name,
                'billing_address'       =>  $request->address,
                'provinces_id'           =>  $request->province_destination,
                'cities_id'               =>  $request->city_destination,
                'billing_discount_code' =>  "sad",
                'billing_discount'      =>  0,
                'billing_subtotal'      =>  $request->subtotal,
                'billing_ongkir'        =>  $request->ongkir,
                'billing_total'         =>  $request->total,
                'error'                 =>  null,
            ]);


            //Insert to pivot table

            foreach (Cart::content() as $item) {
                OrderProduct::create([
                    'order_id'      =>  $order->id,
                    'product_id'    =>  $item->model->id,
                    'quantity'      =>  $item->qty,
                ]);
            }
            Mail::send(new OrderPlace($order));
            return response()->json([
                'pesan'  => 'sukses bosku'
            ]);
            // return redirect()->route('cart.index')->with('success_message', 'terima kasih pesanan anda telah diterima dan akan diproses secepatnya!');
        }
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

    public function thankyou()
    {
        return view('web.page.thankyou');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

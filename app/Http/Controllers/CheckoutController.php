<?php

namespace App\Http\Controllers;

use App\City;
use App\Order;
use Validator;
use App\Profil;
use App\Product;
use App\Province;
use App\OrderProduct;
use App\Mail\OrderPlace;
use App\Mail\OrderPlaced;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->id;
        $alamat = Profil::where('user_id', $user)->get();
        // dd($alamat);
        if (isset($alamat) && count($alamat)) {
            foreach ($alamat as $item) {
                $nama = City::where('id', $item->city_id)->get();
                foreach ($nama as $nam) {
                    $tujuanKota = $nam->city_id;
                }
            }

            $cost = RajaOngkir::ongkosKirim([
                'origin'    =>  152,
                'destination'   =>  $tujuanKota,
                'weight'        =>  1000,
                'courier'       => 'jne',
            ])->get();

            if ($cost[0]['costs']) {
                foreach ($cost as $item) {
                    $ongkir = array(
                        'code'  =>  $item['code'],
                        'name'  =>  $item['name'],
                        'oke'  =>  $item['costs'][0]['cost'][0]['value'],
                        'okeEtd'  =>  $item['costs'][0]['cost'][0]['etd'],
                        'reg'  =>  $item['costs'][1]['cost'][0]['value'],
                        'regEtd'  =>  $item['costs'][1]['cost'][0]['etd'],
                    );
                }
            } else {
                return Redirect::back()->withErrors(['Ooops!!!', 'Maaf untuk sementara kurir tidak melayani pengiriman ke alamat anda.']);
            }

            return view('web.page.checkout')->with([
                'dataOngkir' => $ongkir,
                'alamat'    => $alamat,
                'couriers'  => getNumbers()->get('couriers'),
                'provinces' => getNumbers()->get('provinces'),
                'discount' => getNumbers()->get('discount'),
                'newTax' => getNumbers()->get('newTax'),
                'newTotal' => getNumbers()->get('newTotal'),
            ]);
        }

        return view('web.page.checkout')->with([
            // 'couriers'  => getNumbers()->get('couriers'),
            'provinces' => getNumbers()->get('provinces'),
            'discount' => getNumbers()->get('discount'),
            'newTax' => getNumbers()->get('newTax'),
            'newTotal' => getNumbers()->get('newTotal'),
        ]);

    }

    public function cekOngkir(Request $request)
    {
        
        if (request()->ajax()) {
            $cost = RajaOngkir::ongkosKirim([

                'origin'    =>  setting('site.kota_pengirim'),
                'destination'   =>  $request->city_destination,
                'weight'        =>  setting('site.berat_barang'),
                'courier'       => 'jne',

            ])->get();
        }
        if ($cost[0]['costs']) {
            foreach ($cost as $item) {
                $ongkir = array(
                    'code'  =>  $item['code'],
                    'name'  =>  $item['name'],
                    'oke'  =>  $item['costs'][0]['cost'][0]['value'],
                    'okeEtd'  =>  $item['costs'][0]['cost'][0]['etd'],
                    'reg'  =>  $item['costs'][1]['cost'][0]['value'],
                    'regEtd'  =>  $item['costs'][1]['cost'][0]['etd'],
                );
            }
        }
        return response()->json([
            'ongkir'  => $ongkir
        ]);
    }

    protected function decreaseQuantities()
    {
        foreach (Cart::content() as $item) {
            Product::where('id', $item->model->id)->decrement('quantity', $item->qty);
        }
        
    }

    public function submitOrder(Request $request)
    {
        
        $hasProfil = Profil::where('user_id', Auth::user()->id)->get();
        if ($hasProfil->isEmpty()) {
            $profils = new Profil;
            $profils->user_id = auth()->user()->id;
            $profils->penerima = $request->input('penerima');
            $profils->telepon = $request->input('telepon');
            $profils->province_id = $request->input('province_destination');
            $profils->city_id = $request->input('city_destination');
            $profils->kodePos = $request->input('kodePos');
            $profils->alamatLengkap = $request->input('alamatLengkap');
            $profils->save();
        }

        $subtotal = $request->input('subtotal');
        $ongkir = $request->input('biayakirim');
        $this->validate(request(), [
            'subtotal'  =>  'required',
            'biayakirim'  =>  'required',
        ]);
        $order = Order::create([
            'user_id'               =>  auth()->user() ? auth()->user()->id : null,
            'code'                  => Order::generateCode(),
            'billing_discount_code' =>  'no',
            'billing_discount'      =>  0,
            'billing_subtotal'      =>  $request->input('subtotal'),
            'billing_ongkir'        =>  $request->input('biayakirim'),
            'billing_total'         =>  number_format(str_replace(',', '', $subtotal) + str_replace(',', '', $ongkir), 2),
            'billing_note'          =>  $request->input('catatan'),
            'statuses_id'        =>  '1'
        ]);

        foreach (Cart::content() as $item) {
            OrderProduct::create([
                'order_id'  =>  $order->id,
                'product_id'    =>  $item->model->id,
                'quantity'      =>  $item->qty,
            ]);
        }
        Mail::send(new OrderPlaced($order));
        $this->_generatePaymentToken($order);
        $this->decreaseQuantities();
        Cart::destroy();
        return $this->received($order->id);
    }

    private function _generatePaymentToken($order)
    {
        $this->initPaymentGateway();
        
        $customerDetails = [
            'first_name'    =>  $order->user->name,
            'last_name'     =>  'MID',
            'email'         =>  $order->user->email
        ];
        $params = [
            'enable_payments'       =>  \App\Payment::PAYMENT_CHANNELS,
            'transaction_details'   =>  [
                'order_id' =>  $order->code,
                'gross_amount' =>  filter_var($order->billing_total, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION),
            ],
            'customer_details'  =>  $customerDetails,
            'expiry' =>  [
                'start_time'    => date('Y-m-d H:i:s T'),
                'unit'          =>  \App\Payment::EXPIRY_UNIT,
                'duration'      =>  \App\Payment::EXPIRY_DURATION
            ],
        ];

        $snap = \Midtrans\Snap::createTransaction($params);
        
        if ($snap->token) {
            $order->payment_token = $snap->token;
            $order->payment_url = $snap->redirect_url;
            $order->save();
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {

    //     if ($request->ajax()) {
    //         $rules = array(
    //             'phone.*'    =>  'required',
    //             'name.*'     =>  'required',
    //             'address.*'  =>  'required'
    //         );
    //         $error = Validator::make($request->all(), $rules);
    //         if ($error->fails()) {
    //             return response()->json([
    //                 'error'  =>  $error->errors()->all()
    //             ]);
    //         }
    //         //Insert to orders table
    //         $order = Order::create([
    //             'user_id'               =>  auth()->user() ? auth()->user()->id : null,
    //             'billing_email'         =>  $request->email,
    //             'billing_phone'         =>  $request->phone,
    //             'billing_name'          =>  $request->name,
    //             'billing_address'       =>  $request->address,
    //             'provinces_id'           =>  $request->province_destination,
    //             'cities_id'               =>  $request->city_destination,
    //             'billing_discount_code' =>  "sad",
    //             'billing_discount'      =>  0,
    //             'billing_subtotal'      =>  $request->subtotal,
    //             'billing_ongkir'        =>  $request->ongkir,
    //             'billing_total'         =>  $request->total,
    //             'error'                 =>  null,
    //         ]);

    //         //Insert to pivot table

    //         foreach (Cart::content() as $item) {
    //             OrderProduct::create([
    //                 'order_id'      =>  $order->id,
    //                 'product_id'    =>  $item->model->id,
    //                 'quantity'      =>  $item->qty,
    //             ]);
    //         }
    //         // Mail::send(new OrderPlace($order));


    //         //mengurangi jumlah stock product
    //         // $this->decreaseQuantities();

    //         // Cart::instance('default')->destroy();
    //         // session()->forget('coupon');

    //         return response()->json([
    //             'pesan'  => 'sukses bosku'
    //         ]);
    //         // return redirect()->route('checkout.thankyou')->with('success_message', 'terima kasih pesanan anda telah diterima dan akan diproses secepatnya!');
    //     }
    // }

    public function received($order)
    {   
        $userIdOrder = Order::where('id', $order)->first();
        if (Auth::user()->id == $userIdOrder->user_id) {
            $orderList = Order::where('id', $order)->get();
            $profil = Profil::where('user_id', $userIdOrder)->get();
            return view('web.page.payment.invoice', compact('orderList','profil'));   
        } else {
            return view('error.401');
        }
        
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

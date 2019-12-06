<?php

namespace App\Http\Controllers;

use App\City;
use App\Courier;
use App\Product;
use App\Province;
use Kavist\RajaOngkir\Facades\RajaOngkir;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('featured', true)->inRandomOrder()->get();
        return view('web.page.landing-page', compact('products'));
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
        //
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
        //
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

    public function ongkir()
    {
        $couriers = Courier::pluck('title', 'code');
        $provinces = Province::pluck('title', 'province_id');

        return view('rajaongkir', compact('couriers', 'provinces'));
    }

    public function getCities($id)
    {
        $city = City::where('province_id', $id)->pluck('title', 'city_id');
        return json_encode($city);
    }

    public function submit(Request $request)
    {
        if (request()->ajax()) {
            $cost = RajaOngkir::ongkosKirim([
                'origin'    =>  $request->city_origin,
                'destination'   =>  $request->city_destination,
                'weight'        =>  $request->weight,
                'courier'       =>  $request->courier,
            ])->get();
        }

        // $cat = array();
        // foreach ($cost as $data) {
        //     foreach ($data['costs'] as $cos) {
        //         $cat[$cos['service']] = $cos['cost'][0]['value'];
        //     }
        // }
        // dd($cost);
        // dd($cost[0]['costs'][0]['cost'][0]['value']);
        // array:2 [▼
        // "OKE" => 56000
        // "REG" => 62000
        // ]
        // dd($cat);
        // $cats = "";
        // dd($cat);
        //     foreach ($cat as $item => $value) {
        //         $cats .= '<div class="panel-default"><input name="check_method" type="radio" value="' . $value . '" /><label> ' . $item . '(Rp ' . $value . ' )' . '</label></div>';
        //     }

        $cats = $cost[0]['costs'][0]['cost'][0]['value'];
        $est = $cost[0]['costs'][0]['cost'][0]['etd'];
        return response()->json([
            'ongkir'  => $cats,
            'estimate'  => $est
        ]);
    }
}

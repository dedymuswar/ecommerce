<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{
    public function index()
    {
        $pesananUser = Order::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
        return view('web.page.user.pesanan', compact('pesananUser'));   
    }
}

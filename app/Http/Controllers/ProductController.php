<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function produkDetail($id)
    {
        $id_produk = $id;
        // $data = Produk::find($id_produk);
        $output = Product::findOrFail($id);
        $stockLevel = getStockLevel($output->quantity);

        return response::json([
            'output' => $output,
            'stockLevel' => $stockLevel
        ]);
    }
}

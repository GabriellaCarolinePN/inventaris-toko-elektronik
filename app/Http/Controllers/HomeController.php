<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $jumlahProduk = Product::count();
        $produkStokRendah = Product::where('stok_barang', '<', 5)->count();

        return view('home', compact(
            'jumlahProduk',
            'produkStokRendah'
        ));
    }
}

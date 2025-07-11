<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdukDesaController extends Controller
{
    public function index(Request $request){

        // $produk1 = [
        //     'nama' => 'blaa',
        //     'jenis'=
        //     'toko'
            
        // ]

        // $items = [

        // ]
       
        return view('adminProdukDesa');
    }
}

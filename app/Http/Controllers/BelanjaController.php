<?php

namespace App\Http\Controllers;

use App\Models\Produk;

class BelanjaController extends Controller
{
    public function index()
    {
        $produk = Produk::with('umkm')->get();

        return view('belanja', compact('produk'));
    }

    public function show($id)
    {
        $produk = Produk::with('umkm')->findOrFail($id);

        return view('detailProduk', compact('produk'));
    }
}

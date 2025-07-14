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
        $produkLain = Produk::with('umkm')->inRandomOrder()->limit(10)->get();

        return view('detailProduk', [
            'produk' => $produk,
            'produkLain' => $produkLain
        ]);
    }
}

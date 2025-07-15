<?php

namespace App\Http\Controllers;

use App\Models\Produk;

class BelanjaController extends Controller
{
    public function index()
    {
        $query = Produk::with('umkm');

        if (request()->filled('nama')) {
            $search = request()->nama;

            $query->where(function ($q) use ($search) {
                $q->where('nama_produk', 'like', "%{$search}%")
                ->orWhereHas('umkm', function ($umkmQuery) use ($search) {
                    $umkmQuery->where('nama', 'like', "%{$search}%");
                });
            });
        }

        $produk = $query->get();

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

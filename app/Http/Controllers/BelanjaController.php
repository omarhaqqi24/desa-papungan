<?php

namespace App\Http\Controllers;

use App\Models\Produk;

class BelanjaController extends Controller
{
    public function index()
    {
        // Ambil produk yang memiliki relasi umkm (tidak null)
        $query = Produk::with('umkm')->whereHas('umkm');

        if (request()->filled('nama')) {
            $search = request()->nama;

            $query->where(function ($q) use ($search) {
                $q->where('nama_produk', 'like', "%{$search}%")
                    ->orWhereHas('umkm', function ($umkmQuery) use ($search) {
                        $umkmQuery->where('nama', 'like', "%{$search}%");
                    });
            });
        }

        $items = $query->paginate(9)->appends(request()->query());

        return view('belanja', compact('items'));
    }

    public function show($id)
    {
        // Ambil produk dan umkm-nya; kalau tidak ada akan error 404
        $produk = Produk::with('umkm')->whereHas('umkm')->findOrFail($id);

        // Ambil produk acak lainnya yang juga punya umkm
        $produkLain = Produk::with('umkm')->whereHas('umkm')->inRandomOrder()->limit(10)->get();

        return view('detailProduk', [
            'produk' => $produk,
            'produkLain' => $produkLain
        ]);
    }
}

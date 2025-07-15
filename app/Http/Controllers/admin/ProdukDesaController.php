<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ProdukDesaController extends Controller
{
    public function index(Request $request)
    {
        // 1. data dummy
        $produkTemplate = [
            'id'           => 0,
            'nama'         => 'test',
            'jenis'        => 'jenisan',
            'toko'         => 'down',
            'alamat'       => 'bumi',
            'kontak'       => '911',
            'hargaRendah'  => 5000,
            'hargaTinggi'  => 5001,
            'desc'         => 'awda awda awda'
        ];
        $items = [];
        for ($i = 0; $i < 22; $i++) {
            $p               = $produkTemplate;
            $p['id']         = $i;
            $p['nama']       = "Produk {$i}";
            $p['jenis']      = ['A', 'B', 'C'][array_rand(['A','B','C'])];
            $p['toko']       = ['Toko1', 'Toko2', 'Toko3'][array_rand(['Toko1','Toko2','Toko3'])];
            $items[]         = $p;
        }

        // 2. Ubah ke Collection
        $collection = collect($items);

        // 3. Ambil parameter pencarian & filter
        $q      = $request->input('qProduk');
        $jenis  = $request->input('jenisFilter');
        $toko   = $request->input('tokoFilter');

        // 4. Terapkan pencarian
        if ($q) {
            $collection = $collection->filter(function($item) use ($q) {
                return stripos($item['nama'], $q) !== false;
            });
        }

        // 5. Terapkan filter jenis
        if ($jenis && $jenis !== 'Semua Jenis Produk') {
            $collection = $collection->where('jenis', $jenis);
        }

        // 6. Terapkan filter toko
        if ($toko && $toko !== 'Semua Toko') {
            $collection = $collection->where('toko', $toko);
        }

        // 7. Pagination
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage     = 10;
        $offset      = ($currentPage - 1) * $perPage;

        $currentPageItems = $collection
            ->slice($offset, $perPage)
            ->values()      // reset index
            ->all();

        $paginatedItems = new LengthAwarePaginator(
            $currentPageItems,
            $collection->count(),
            $perPage,
            $currentPage,
            [
                'path'  => $request->url(),
                'query' => $request->query(),
            ]
        );

        // 8. Kirim ke view
        return view('adminProdukDesa', [
            'items'   => $paginatedItems,
            'jenises' => ['Semua Jenis Produk', 'A','B','C'],
            'tokos'    => ['Semua Toko', 'Toko1','Toko2','Toko3'],
            'qProduk'     => $q,
            'jenisFilter' => $jenis,
            'tokoFilter'  => $toko,
        ]);
    }
}

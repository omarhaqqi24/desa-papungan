<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ProdukDesaController extends Controller
{
    public function index(Request $request){

        $produk = [
            'nama' => 'test',
            'jenis'=> 'jenisan',
            'toko' => 'down',
            'alamat' => 'bumi',
            'kontak' => '911',
            'hargaRendah' => 5000,
            'hargaTinggi' => 5001,
            'desc' => 'awda awda awda'
        ];

        $items = array_fill(0, 22, $produk);
        
        $collection = collect($items);

        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 10;

        $currentPageItems = $collection->slice(($currentPage-1) * $perPage, $perPage)->all();

        $paginatedItems = new LengthAwarePaginator(
            $currentPageItems, 
            $collection->count(),
            $perPage,
            $currentPage,
            [
                'path'  => $request->url(),     // URL dasar untuk link
                'query' => $request->query()
            ]
            );

       
        return view('adminProdukDesa', [
            'items' => $paginatedItems
        ]);
    }
}

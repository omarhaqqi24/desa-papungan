<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class umkmController extends Controller
{
    public function index(Request $request)
    {
        $query = \App\Models\Umkm::query();
        if ($request->nama) {
            $query->where('nama', 'like', '%' . $request->nama . '%');
        }
        $paginatedItems = $query->paginate(5);

        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', env("API_BASE_URL", "http://localhost:8001") . "/api/data-desa/4");
        $videoUmkm = json_decode($response->getBody());

        return view('umkm', [
            'paginatedItems' => $paginatedItems,
            'videoUmkm' => $videoUmkm,
        ]);
    }
}
        
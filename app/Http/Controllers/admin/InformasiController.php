<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
class InformasiController extends Controller
{
    public function index(){
        $client = new Client();
        $response = $client->request("GET", env("API_BASE_URL", "http://localhost:8001") . "/api/berita");
    
        // Mendapatkan data dari response API
        $responseData = json_decode($response->getBody(), true);
        $data = $responseData['data'] ?? [];
    
        // Paginate data manually
        $perPage = 10; // Jumlah item per halaman
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = array_slice($data, ($currentPage - 1) * $perPage, $perPage);
        $paginatedData = new LengthAwarePaginator(
            $currentItems,
            count($data),
            $perPage,
            $currentPage,
            ['path' => LengthAwarePaginator::resolveCurrentPath()]
        );
    

        return view("test",["paginatedData"=>$paginatedData]);
    }
}

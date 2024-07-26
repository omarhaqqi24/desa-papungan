<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class UmkmDesaController extends Controller
{
    public function index()
    {
        $client = new Client();

        $response1 = $client->request('GET', env("API_BASE_URL", "http://localhost:8001") . "/api/umkm");

        $umkm = json_decode($response1->getBody());

        return view('adminUmkm', [
            "umkm" => $umkm,
        ]);
    }
}

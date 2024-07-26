<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class InformasiDesaController extends Controller
{
    public function index() 
    {
        $client = new Client();

        $response1 = $client->request('GET', env("API_BASE_URL", "http://localhost:8001") . "/api/berita?pub=1");
        $response2 = $client->request('GET', env("API_BASE_URL", "http://localhost:8001") . "/api/pengumuman?pub=1");

        $berita = json_decode($response1->getBody());
        $pengumuman = json_decode($response2->getBody());

        return view('adminInformasi', [
            "berita" => $berita,
            "pengumuman" => $pengumuman,
        ]);
    }
}

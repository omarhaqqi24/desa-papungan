<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index() {
        $client = new Client();

        $response_berita = $client->request("GET", env("API_BASE_URL", "http://localhost:8001") . "/api/berita?pub=1");
        $berita = json_decode($response_berita->getBody());

        $response_pengumuman = $client->request("GET",env("API_BASE_URL", "http://localhost:8001") . "/api/pengumuman?pub=1");
        $pengumuman = json_decode($response_pengumuman->getBody());

        return view('index',[
            "berita" => $berita,
            "pengumuman" => $pengumuman
        ]);

    }
}

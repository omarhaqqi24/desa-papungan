<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class BeritaPageController extends Controller
{
    public function index($id) {
            $client = new Client();
            $response = $client->request("GET", env("API_BASE_URL", "http://localhost:8001") . "/api/berita/$id");
            $berita = json_decode($response->getBody());
    
            return view('berita',["berita" => $berita]);
    
    }
}

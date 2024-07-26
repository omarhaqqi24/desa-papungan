<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PetaUmkmController extends Controller
{
    public function index() {
        $client = new Client();
        $response = $client->request("GET", env("API_BASE_URL", "http://localhost:8001") . "/api/umkm");
        $dataUmkm = json_decode($response->getBody());

        return view('peta-umkm', ['data'=>$dataUmkm]);
    }
}

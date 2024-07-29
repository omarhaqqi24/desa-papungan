<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PariwisataController extends Controller
{
    public function index(Request $request)
    {
        $client = new Client();

        $response1 = $client->request('GET', env("API_BASE_URL", "http://localhost:8001") . "/api/pariwisata");
        $response2 = $client->request('GET', env("API_BASE_URL", "http://localhost:8001") . "/api/data-desa/5");

        $dataVideo = json_decode($response2->getBody());
        $pariwisata = json_decode($response1->getBody());

        return view('pariwisataDesa', [
            "pariwisata" => $pariwisata,
            "dataVideo" => $dataVideo
        ]);
    }
}

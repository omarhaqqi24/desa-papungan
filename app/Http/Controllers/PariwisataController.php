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

        $pariwisata = json_decode($response1->getBody());

        return view('pariwisataDesa', [
            "pariwisata" => $pariwisata,
        ]);
    }
}

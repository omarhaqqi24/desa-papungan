<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ProfilDesaController extends Controller
{
    public function index(){
        $client = new Client;

        $response = $client->request("GET", env("API_BASE_URL", "http://localhost:8001") . "/api/data-desa/1");

        $data = json_decode($response->getBody());

        return view("adminProfilDesa",["data"=>$data]);
    }
}

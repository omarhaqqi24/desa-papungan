<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index(){
        $client = new Client();

        $response = $client->request("GET", env("API_BASE_URL", "http://localhost:8001") . "/api/pengumuman");

        $data = json_decode($response->getBody());

        return view("test",["data"=>$data]);
    }
}

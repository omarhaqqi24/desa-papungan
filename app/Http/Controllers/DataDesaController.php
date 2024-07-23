<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class DataDesaController extends Controller
{
    public function index(){
        $client = new Client();
       
        $response1 = $client -> request ('GET', env("API_BASE_URL", "http://localhost:8001") . "/api/data-desa/1");

        $response2 = $client -> request ('GET', env("API_BASE_URL", "http://localhost:8001") . "/api/data-desa/2");

        $responseBody1 = json_decode($response1->getBody());
        $responseBody2 = json_decode($response2->getBody());

        return view("profilDesa",["data1"=>$responseBody1, "data2" => $responseBody2]);        
    }
}

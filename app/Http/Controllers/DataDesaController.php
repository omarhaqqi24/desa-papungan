<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class DataDesaController extends Controller
{
    public function index(){
        $client = new Client();
       
        $response1 = $client -> request ('GET', env("API_BASE_URL", "http://localhost:8001") . "/api/data-desa/1");
        $responseBody1 = json_decode($response1->getBody());

        $response2 = $client -> request ('GET', env("API_BASE_URL", "http://localhost:8001") . "/api/data-desa/2");
        $responseBody2 = json_decode($response2->getBody());

        $response3 = $client -> request('GET', env("API_BASE_URL", "http://127.0.0.1:8001") . "/api/v-misi");
        $responseBody3 = json_decode($response3->getBody());

        return view("profilDesa",["data1"=>$responseBody1, "data2" => $responseBody2, "data3" => $responseBody3]);        
    }
}

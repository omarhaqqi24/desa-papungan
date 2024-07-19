<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
public function index(){
     $client = new Client();

     $response = $client->request("GET","http://127.0.0.1:8001/api/pengumuman");

     $data = json_decode($response->getBody());

    return view("test",["data"=>$data]);
}
}

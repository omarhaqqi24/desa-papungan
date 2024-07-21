<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PerangkatDesaController extends Controller
{
    public function getData(){
    $client = new Client();

     $response = $client->request("GET","http://127.0.0.1:8001/api/perangkat-desa");

     $perangkatDesas = json_decode($response->getBody());

     $response2 = $client->request("GET","http://127.0.0.1:8001/api/lembaga");
    
     $lembagas = json_decode($response2->getBody());

     return view("pemerintahan",["perangkatDesas"=>$perangkatDesas,"lembagas"=>$lembagas]);
    //dd($lembagas);
    }
}

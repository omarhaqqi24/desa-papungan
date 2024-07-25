<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class ProfilDesaController extends Controller
{
    public function index(){
        $client = new Client;

        $response1 = $client->request("GET", env("API_BASE_URL", "http://localhost:8001") . "/api/data-desa/1");
        $response2 = $client->request("GET", env("API_BASE_URL", "http://localhost:8001") . "/api/v-misi");

        $profilDesa = json_decode($response1->getBody());
        $vmData = json_decode($response2->getBody());
        $visi = $vmData->data[0];
        $misi = $vmData->data;

        return view("adminProfilDesa", [
            "profilDesa" => $profilDesa, 
            "visi" => $visi,
            "misi" => $misi
        ]);
    }

    public function updateProfilDesa(Request $request)
    {
        try {
            $client = new Client();
            $image = $request->file('foto');
            $token = Session::get('api-token');

            $response = $client->request("POST", env("API_BASE_URL", "http://localhost:8001") . "/api/data-desa/1?_method=PUT", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                ],
                'multipart' => [
                    [
                        'name'     => 'foto',
                        'contents' => fopen($image->getPathname(), 'r'),
                        'filename' => $image->getClientOriginalName(),
                    ],
                    [
                        'name'     => 'penjelasan',
                        'contents' => $request->penjelasan,
                    ],
                ],
            ]);

            $responseBody = json_decode($response->getBody());

            return redirect()->back()->with('success', $responseBody->message);
        } catch (BadResponseException $e) {
            $response = $e->getResponse();
            $result = json_decode($response->getBody());

            return redirect()->back()->withErrors($result->message)->withInput($request->all());
        }
    }

    public function updateVisiDesa(Request $request)
    {
        
    }
}

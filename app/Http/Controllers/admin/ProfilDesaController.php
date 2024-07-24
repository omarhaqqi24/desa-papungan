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

        $response = $client->request("GET", env("API_BASE_URL", "http://localhost:8001") . "/api/data-desa/1");

        $data = json_decode($response->getBody());

        return view("adminProfilDesa",["data"=>$data]);
    }

    public function update(Request $request)
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
                    ...(!empty($image) ? [
                        'name'     => 'foto',
                        'contents' => fopen($image->getPathname(), 'r'),
                        'filename' => $image->getClientOriginalName(),
                    ] : []),
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
}

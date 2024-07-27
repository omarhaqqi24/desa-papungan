<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use COM;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Psr7\Request as GuzzleRequest;
use GuzzleHttp\Psr7\Response as GuzzleResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PariwisataDesaController extends Controller
{
    public function index()
    {
        $client = new Client();

        $response1 = $client->request('GET', env("API_BASE_URL", "http://localhost:8001") . "/api/pariwisata");

        $pariwisata = json_decode($response1->getBody());

        return view('adminPariwisata', [
            "pariwisata" => $pariwisata
        ]);
    }

    public function tambahPariwisata(Request $request)
    {
        try {
            $client = new Client();
            $token = Session::get('api-token');

            $image = $request->file('foto');
            if (empty($image)) {
                $guzzleRequest = new GuzzleRequest('GET', env("API_BASE_URL", "http://localhost:8001") . "/api/pariwisata");
                $guzzleResponse = new GuzzleResponse(400, [], json_encode(['message' => 'Foto harus diisi!']));

                throw new BadResponseException('Foto harus diisi!', $guzzleRequest, $guzzleResponse);
            }

            $response = $client->request('POST', env("API_BASE_URL", "http://localhost:8001")."/api/pariwisata", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token
                ],
                'multipart' => [
                    [
                        'name' => 'foto',
                        'contents' => fopen($image->getPathname(), 'r'),
                        'filename' => $image->getClientOriginalName()
                    ],
                    [
                        'name' => 'penjelasan',
                        'contents' => $request->penjelasan
                    ]
                ]
            ]);

            $responseBody = json_decode($response->getBody());
            return redirect()->back()->with('success', $responseBody->message);

        } catch (BadResponseException $e) {
            $response = $e->getResponse();
            $result = json_decode($response->getBody());
 
            return redirect()->back()->withErrors($result->message);
        }
    }

    public function updatePariwisata(Request $request)
    {
        try {
            $client = new Client();
            $token = Session::get('api-token');

            $image = $request->file('foto');
            if (!empty($image)) {
                $multipart = [
                    [
                        'name'     => 'foto',
                        'contents' => fopen($image->getPathname(), 'r'),
                        'filename' => $image->getClientOriginalName(),
                    ],
                    [
                        'name'     => 'penjelasan',
                        'contents' => $request->penjelasan,
                    ],
                ];
            } else {
                $multipart = [
                    [
                        'name'     => 'penjelasan',
                        'contents' => $request->penjelasan,
                    ],
                ];
            }

            $response = $client->request('POST', env("API_BASE_URL", "http://localhost:8001")."/api/pariwisata/$request->id?_method=PUT", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token
                ],
                'multipart' => $multipart
            ]);

            $responseBody = json_decode($response->getBody());
            return redirect()->back()->with('success', $responseBody->message);

        } catch (BadResponseException $e) {
            $response = $e->getResponse();
            $result = json_decode($response->getBody());
 
            return redirect()->back()->withErrors($result->message);
        }
    }

    public function deletePariwisata($id)
    {
        try {
            $client = new Client();
            $token = Session::get('api-token');

            $response = $client->request('DELETE', env("API_BASE_URL", "http://localhost:8001")."/api/pariwisata/$id", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token
                ]
            ]);

            $responseBody = json_decode($response->getBody());
            return redirect()->back()->with('success', $responseBody->message);

        } catch (BadResponseException $e) {
            $response = $e->getResponse();
            $result = json_decode($response->getBody());
 
            return redirect()->back()->withErrors($result->message);
        }
    }
}

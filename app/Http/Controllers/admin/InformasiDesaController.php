<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Psr7\Request as GuzzleRequest;
use GuzzleHttp\Psr7\Response as GuzzleResponse;

class InformasiDesaController extends Controller
{
    public function index() 
    {
        $client = new Client();

        $response1 = $client->request('GET', env("API_BASE_URL", "http://localhost:8001") . "/api/berita?pub=1");
        $response2 = $client->request('GET', env("API_BASE_URL", "http://localhost:8001") . "/api/pengumuman?pub=1");

        $berita = json_decode($response1->getBody());
        $pengumuman = json_decode($response2->getBody());

        return view('adminInformasi', [
            "berita" => $berita,
            "pengumuman" => $pengumuman,
        ]);
    }

    public function tambahBerita(Request $request)
    {
        try {
            $client = new Client();
            $token = Session::get('api-token');

            $image = $request->file('foto');
            if (empty($image)) {
                $guzzleRequest = new GuzzleRequest('GET', env("API_BASE_URL", "http://localhost:8001") . "/api/berita");
                $guzzleResponse = new GuzzleResponse(400, [], json_encode(['message' => 'Foto harus diisi!']));

                throw new BadResponseException('Foto harus diisi!', $guzzleRequest, $guzzleResponse);
            }
            
            $response = $client->request('POST', env("API_BASE_URL", "http://localhost:8001") . "/api/berita", [
                'headers' => [
                    'Authorization' => 'Bearer '.$token
                ],
                'multipart' => [
                    [
                        'name' => 'nama',
                        'contents' => $request->nama
                    ],
                    [
                        'name' => 'judul',
                        'contents' => $request->judul
                    ],
                    [
                        'name' => 'isi',
                        'contents' => $request->isi
                    ],
                    [
                        'name' => 'foto',
                        'contents' => fopen($image->getPathname(), 'r'),
                        'filename' => $image->getClientOriginalName(),
                    ],
                ]
            ]);

            $responseBody = json_decode($response->getBody());
            return redirect()->back()->with('success', $responseBody->message);

        } catch (BadResponseException $e){
            dd($e);
            return;
            $response = $e->getResponse();
            $result = json_decode($response->getBody());

            return redirect()->back()->withErrors($result->message)->withInput($request->all());
        }
    }

    public function tambahPengumuman(Request $request)
    {
        try {
            $client = new Client();
            $token = Session::get('api-token');
            
            $response = $client->request('POST', env("API_BASE_URL", "http://localhost:8001") . "/api/pengumuman", [
                'headers' => [
                    'Authorization' => 'Bearer '.$token
                ],
                'multipart' => [
                    [
                        'name' => 'nama',
                        'contents' => $request->nama
                    ],
                    [
                        'name' => 'judul',
                        'contents' => $request->judul
                    ],
                    [
                        'name' => 'isi',
                        'contents' => $request->isi
                    ]
                ]
            ]);

            $responseBody = json_decode($response->getBody());
            return redirect()->back()->with('success', $responseBody->message);

        } catch (BadResponseException $e){
            $response = $e->getResponse();
            $result = json_decode($response->getBody());

            return redirect()->back()->withErrors($result->message)->withInput($request->all());
        }
    }
}

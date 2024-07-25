<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class PengumumanController extends Controller
{
    public function index(){
        $client = new Client();

        $response = $client->request("GET", env("API_BASE_URL", "http://localhost:8001") . "/api/pengumuman?pub=1");
        $pengumuman = json_decode($response->getBody());

        $response = $client->request("GET", env("API_BASE_URL", "http://localhost:8001") . "/api/berita?pub=1");
        $berita = json_decode($response->getBody());

        return view("informasi",["pengumuman"=>$pengumuman, "berita"=>$berita]);
    }
    public function store(Request $request)
    {
        try{
            $client = new Client();
            if ($request -> kategori=="Berita"){
                $image = $request->file('foto');
                $response = $client->request("POST", env("API_BASE_URL", "http://localhost:8001") . "/api/berita", [
                    'multipart' => [
                        [
                            'name' => 'judul', 
                            'contents' => $request -> judul
                        ],
                        [
                            'name' => 'isi',
                            'contents' => $request -> isi
                        ],
                        [
                            'name' => 'foto',
                            'contents' => fopen($image->getPathname(), 'r'),
                            'filename' => $image->getClientOriginalName()
                        ],
                        [
                            'name' => 'nama',
                            'contents' => $request -> nama
                        ]

                    ]

                ]);
            }
            else if($request -> kategori=="Pengumuman"){
                $response = $client->request("POST", env("API_BASE_URL", "http://localhost:8001") . "/api/pengumuman", [
                    'multipart' => [
                        [
                            'name' => 'judul', 
                            'contents' => $request -> judul
                        ],
                        [
                            'name' => 'isi',
                            'contents' => $request -> isi
                        ],
                        [
                            'name' => 'nama',
                            'contents' => $request -> nama
                        ]

                    ]
                ]);
            }  else if($request -> kategori=="Pengumuman"){
                $response = $client->request("POST", env("API_BASE_URL", "http://localhost:8001") . "/api/aspirasi", [
                    'multipart' => [
                        [
                            'name' => 'judul', 
                            'contents' => $request -> judul
                        ],
                        [
                            'name' => 'isi',
                            'contents' => $request -> isi
                        ],
                        [
                            'name' => 'nama',
                            'contents' => $request -> nama
                        ]

                    ]
                ]);
        }

        $responseBody = json_decode($response->getBody());
        return redirect()->back()->with('success', $responseBody->message);

    } catch (BadResponseException $e){
        $response = $e->getResponse();
        $result = json_decode($response->getBody());

        return redirect()->back()->withErrors($result->message)->withInput($request->all());
    }
    }
}

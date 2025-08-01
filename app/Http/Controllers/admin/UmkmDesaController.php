<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Umkm;
use App\Models\Produk; // Added this line to import the Product model
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Psr7\Request as GuzzleRequest;
use GuzzleHttp\Psr7\Response as GuzzleResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Session;

class UmkmDesaController extends Controller
{
    public function index(Request $request)
    {
        // Ambil data video dari API (tetap)
        $client = new Client();
        $response2 = $client->request('GET', env("API_BASE_URL", "http://localhost:8001") . "/api/data-desa/4");
        $dataVideo = json_decode($response2->getBody());

        // Ambil data UMKM dari database langsung
        $query = Umkm::query();
        if ($request->qUmkm) {
            $query->where('nama', 'like', '%' . $request->qUmkm . '%');
        }
        $paginatedItems = $query->paginate(5);

        return view('adminUmkm', [
            "umkm" => $paginatedItems, // ganti dari API ke paginatedItems
            "qUmkm" => $request->qUmkm,
            'paginatedItems' => $paginatedItems,
            'dataVideo' => $dataVideo
        ]);
    }

    public function updateVideoUmkm(Request $request)
    {
        try {
            $client = new Client();
            $token = Session::get('api-token');

            $lastSlashPosition = strrpos($request->penjelasan, '/');
            if ($lastSlashPosition !== false) {
                $urlPart = substr($request->penjelasan, $lastSlashPosition);
            } else {
                $urlPart = $request->penjelasan;
            }

            $response = $client->request('POST', env("API_BASE_URL", "http://localhost:8001") . "/api/data-desa/4?_method=PUT", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token
                ],
                'multipart' => [
                    [
                        'name' => 'penjelasan',
                        'contents' => "https://www.youtube.com/embed" . $urlPart
                    ],
                    [
                        'name' => 'penjelasan_raw',
                        'contents' => '-'
                    ]
                ]
            ]);

            $responseBody = json_decode($response->getBody());
            return redirect()->back()->with('success', $responseBody->message);
        } catch (BadResponseException $e) {
            $response = $e->getResponse();
            $result = json_decode($response->getBody());

            return redirect()->back()->withErrors($result->message)->withInput($request->all());
        }
    }

    public function tambahUmkm(Request $request)
    {
        try {
            $client = new Client();
            $token = Session::get('api-token');


            $response = $client->request("POST", env("API_BASE_URL", "http://localhost:8001") . "/api/umkm", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token
                ],
                'multipart' => [
                    [
                        'name' => 'nama',
                        'contents' => $request->nama
                    ],
                    [
                        'name' => 'deskripsi',
                        'contents' => $request->deskripsi
                    ],
                    [
                        'name' => 'alamat',
                        'contents' => $request->alamat
                    ],
                    [
                        'name' => 'kontak',
                        'contents' => $request->kontak
                    ],
                    [
                        'name' => 'jam_buka',
                        'contents' => $request->jam_buka
                    ],
                    [
                        'name' => 'lat',
                        'contents' => $request->lat
                    ],
                    [
                        'name' => 'long',
                        'contents' => $request->long
                    ],
                    [
                        'name' => 'url_map',
                        'contents' => $request->url_map
                    ],
                    [
                        'name' => 'no_nib',
                        'contents' => $request->no_nib
                    ],
                    [
                        'name' => 'no_bpom',
                        'contents' => $request->no_bpom
                    ]

                ]

            ]);

            $responseBody = json_decode($response->getBody());
            return redirect()->back()->with('success', $responseBody->message);
        } catch (BadResponseException $e) {
            $response = $e->getResponse();
            $result = json_decode($response->getBody());

            return redirect()->back()->withErrors($result->message)->withInput($request->all());
        }
    }

    public function updateUmkm(Request $request)
    {
        try {
            $client = new Client();
            $token = Session::get('api-token');

            $response = $client->request("POST", env("API_BASE_URL", "http://localhost:8001") . "/api/umkm/$request->id?_method=PUT", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token
                ],
                'multipart' => [
                    [
                        'name' => 'nama',
                        'contents' => $request->nama
                    ],
                    [
                        'name' => 'deskripsi',
                        'contents' => $request->deskripsi
                    ],
                    [
                        'name' => 'alamat',
                        'contents' => $request->alamat
                    ],
                    [
                        'name' => 'kontak',
                        'contents' => $request->kontak
                    ],
                    [
                        'name' => 'jam_buka',
                        'contents' => $request->jam_buka
                    ],
                    [
                        'name' => 'lat',
                        'contents' => $request->lat
                    ],
                    [
                        'name' => 'long',
                        'contents' => $request->long
                    ],
                    [
                        'name' => 'url_map',
                        'contents' => $request->url_map
                    ],
                    [
                        'name' => 'no_nib',
                        'contents' => $request->no_nib
                    ],
                    [
                        'name' => 'no_bpom',
                        'contents' => $request->no_bpom
                    ],

                ]

            ]);

            $responseBody = json_decode($response->getBody());
            return redirect()->back()->with('success', $responseBody->message);
        } catch (BadResponseException $e) {
            $response = $e->getResponse();
            $result = json_decode($response->getBody());

            return redirect()->back()->withErrors($result->message)->withInput($request->all());
        }
    }

    public function tambahFotoUmkm(Request $request)
    {
        try {
            $client = new Client();
            $token = Session::get('api-token');

            $image = $request->file('foto');
            if (empty($image)) {
                $guzzleRequest = new GuzzleRequest('GET', env("API_BASE_URL", "http://localhost:8001") . "/api/umkm/$request->id/foto");
                $guzzleResponse = new GuzzleResponse(400, [], json_encode(['message' => 'Foto harus diisi!']));

                throw new BadResponseException('Foto harus diisi!', $guzzleRequest, $guzzleResponse);
            }

            $response = $client->request('POST', env("API_BASE_URL", "http://localhost:8001") . "/api/umkm/$request->id/foto", [
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
                        'name' => 'umkm_id',
                        'contents' => $request->id
                    ]
                ]
            ]);

            $responseBody = json_decode($response->getBody());
            return redirect()->back()->with('success', $responseBody->message);
        } catch (BadResponseException $e) {
            $response = $e->getResponse();
            $result = json_decode($response->getBody());

            return redirect()->back()->withErrors($result->message)->withInput($request->all());
        }
    }

    public function deleteFotoUmkm($id)
    {
        try {
            $client = new Client();
            $token = Session::get('api-token');

            $response = $client->request('DELETE', env("API_BASE_URL", "http://localhost:8001") . "/api/umkm/$id/foto", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
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

    public function deleteUmkm($id)
    {
        try {
            // Delete related products locally first
            // This assumes a 'Product' model exists and has an 'umkm_id' foreign key
            Produk::where('umkm_id', $id)->delete();

            $client = new Client();
            $token = Session::get('api-token');

            $response = $client->request('DELETE', env("API_BASE_URL", "http://localhost:8001") . "/api/umkm/$id", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
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

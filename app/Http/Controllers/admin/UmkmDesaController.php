<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
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
        $client = new Client();

        $response1 = $client->request('GET', env("API_BASE_URL", "http://localhost:8001") . "/api/umkm?nama=$request->qUmkm");

        $umkm = json_decode($response1->getBody());


        $collection = collect($umkm->data->resource);


        $currentPage = LengthAwarePaginator::resolveCurrentPage();


        $perPage = 5;


        $currentPageItems = $collection->slice(($currentPage - 1) * $perPage, $perPage)->all();


        $paginatedItems = new LengthAwarePaginator($currentPageItems, $collection->count(), $perPage);

        $paginatedItems->setPath($request->url());


        return view('adminUmkm', [
            "umkm" => $umkm,
            "jenises" => [
                'Opak Gambir', 'Rempeyek', 'Kue Kering', 'Matari', 'Sambel Pecel', 'Warung Makan', 'Keripik',
                'Rengginang', 'Jamu', 'Susu', 'Cenil', 'Sermier', 'Bakpia', 'Durian', 'lainnya'],
            "qUmkm" => $request->qUmkm,
            'paginatedItems' => $paginatedItems,
        ]);
    }

    public function tambahUmkm(Request $request)
    {
        try {
            $client = new Client();
            $token = Session::get('api-token');

            $dataJenis = $request->jenis;
            if (empty($dataJenis)) {
                $guzzleRequest = new GuzzleRequest('GET', env("API_BASE_URL", "http://localhost:8001") . "/api/umkm/$request->id/foto");
                $guzzleResponse = new GuzzleResponse(400, [], json_encode(['message' => 'Jenis UMKM harus diisi!']));

                throw new BadResponseException('Jenis UMKM harus diisi!', $guzzleRequest, $guzzleResponse);
            }

            foreach ($request->jenis as $jns) {
                $jenises[] = [
                    'name' => 'jenis[]',
                    'contents' => $jns
                ];
            }

            $response = $client->request("POST", env("API_BASE_URL", "http://localhost:8001") . "/api/umkm", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token
                ],
                'multipart' => [
                    [
                        'name' => 'nama',
                        'contents' => $request->nama
                    ],
                    ...$jenises,
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
                        'name' => 'no_nib',
                        'contents' => $request->no_nib
                    ],
                    [
                        'name' => 'no_pirt',
                        'contents' => $request->no_pirt
                    ],
                    [
                        'name' => 'no_halal',
                        'contents' => $request->no_halal
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

    public function updateUmkm(Request $request)
    {
        try {
            $client = new Client();
            $token = Session::get('api-token');

            $dataJenis = $request->jenis;
            if (empty($dataJenis)) {
                $guzzleRequest = new GuzzleRequest('GET', env("API_BASE_URL", "http://localhost:8001") . "/api/umkm/$request->id/foto");
                $guzzleResponse = new GuzzleResponse(400, [], json_encode(['message' => 'Jenis UMKM harus diisi!']));

                throw new BadResponseException('Jenis UMKM harus diisi!', $guzzleRequest, $guzzleResponse);
            }

            foreach ($request->jenis as $jns) {
                $jenises[] = [
                    'name' => 'jenis[]',
                    'contents' => $jns
                ];
            }

            $response = $client->request("POST", env("API_BASE_URL", "http://localhost:8001") . "/api/umkm/$request->id?_method=PUT", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token
                ],
                'multipart' => [
                    [
                        'name' => 'nama',
                        'contents' => $request->nama
                    ],
                    ...$jenises,
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
                        'name' => 'no_nib',
                        'contents' => $request->no_nib
                    ],
                    [
                        'name' => 'no_pirt',
                        'contents' => $request->no_pirt
                    ],
                    [
                        'name' => 'no_halal',
                        'contents' => $request->no_halal
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


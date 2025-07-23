<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Psr7\Request as GuzzleRequest;
use GuzzleHttp\Psr7\Response as GuzzleResponse;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Redis;

class InformasiDesaController extends Controller
{
    public function index(Request $request)
    {
        $client = new Client();
        $token = Session::get('api-token');

        $response1 = $client->request('GET', env("API_BASE_URL", "http://localhost:8001") . "/api/berita?pub=1&judul=$request->qBerita");
        $response2 = $client->request('GET', env("API_BASE_URL", "http://localhost:8001") . "/api/pengumuman?pub=1&judul=$request->qPengumuman");
        $response3 = $client->request('GET', env("API_BASE_URL", "http://localhost:8001") . "/api/berita?pub=0&judul=$request->qBeritaReq");
        $response4 = $client->request('GET', env("API_BASE_URL", "http://localhost:8001") . "/api/pengumuman?pub=0&judul=$request->qPengumumanReq");
        $response5 = $client->request('GET', env("API_BASE_URL", "http://localhost:8001") . "/api/aspirasi?judul=$request->qAspirasi", [
            'headers' => [
                'Authorization' => 'Bearer ' . $token
            ],
        ]);

        $berita = json_decode($response1->getBody());
        $pengumuman = json_decode($response2->getBody());
        $beritaReq = json_decode($response3->getBody());
        $pengumumanReq = json_decode($response4->getBody());
        $aspirasi = json_decode($response5->getBody());


        // Paginator Daftar Permintaan Berita
        $collectionBerita = collect($beritaReq->data);
        $currentPageBerita = LengthAwarePaginator::resolveCurrentPage('beritas');
        $perPageBerita = 5;
        $currentPageItemsBerita = $collectionBerita->slice(($currentPageBerita - 1) * $perPageBerita, $perPageBerita)->all();
        $paginatedItemsBerita = new LengthAwarePaginator($currentPageItemsBerita, $collectionBerita->count(), $perPageBerita,$currentPageBerita);
        $paginatedItemsBerita->setPath($request->url())->setPageName('beritas');

        // Paginator Daftar Permintaan Aspirasi
        $collectionAspirasi = collect($aspirasi->data);
        $currentPageAspirasi = LengthAwarePaginator::resolveCurrentPage('aspirasis');
        $perPageAspirasi = 5;
        $currentPageItemsAspirasi = $collectionAspirasi->slice(($currentPageAspirasi - 1) * $perPageAspirasi, $perPageAspirasi)->all();
        $paginatedItemsAspirasi = new LengthAwarePaginator($currentPageItemsAspirasi, $collectionAspirasi->count(), $perPageAspirasi,$currentPageAspirasi);
        $paginatedItemsAspirasi->setPath($request->url())->setPageName('aspirasis');

        // Paginator Daftar Permintaan Pengumuman
        $collectionPengumuman = collect($pengumumanReq->data);
        $currentPagePengumuman = LengthAwarePaginator::resolveCurrentPage('pengumumans');
        $perPagePengumuman = 5;
        $currentPageItemsPengumuman = $collectionPengumuman->slice(($currentPagePengumuman - 1) * $perPagePengumuman, $perPagePengumuman)->all();
        $paginatedItemsPengumuman = new LengthAwarePaginator($currentPageItemsPengumuman, $collectionPengumuman->count(), $perPagePengumuman,$currentPagePengumuman);
        $paginatedItemsPengumuman->setPath($request->url())->setPageName('pengumumans');


        return view('adminInformasi', [
            "berita" => $berita,
            "pengumuman" => $pengumuman,
            "beritaReq" => $beritaReq,
            "pengumumanReq" => $pengumumanReq,
            "aspirasi" => $aspirasi,
            "paginatedItemsBerita" => $paginatedItemsBerita,
            "paginatedItemsAspirasi" => $paginatedItemsAspirasi,
            "paginatedItemsPengumuman" => $paginatedItemsPengumuman

        ]);
    }

    public function tambahBerita(Request $request)
    {
        try {
            $client = new Client();
            $token = Session::get('api-token');

            $images = $request->file('foto');

            if (empty($images)) {
                $guzzleRequest = new GuzzleRequest('GET', env("API_BASE_URL", "http://localhost:8001") . "/api/berita");
                $guzzleResponse = new GuzzleResponse(400, [], json_encode(['message' => 'Foto harus diisi!']));

                throw new BadResponseException('Foto harus diisi!', $guzzleRequest, $guzzleResponse);
            }

            // Mulai bangun bagian multipart
            $multipart = [
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
            ];

            // Tambahkan semua foto ke multipart
            foreach ($images as $image) {
                $multipart[] = [
                    'name' => 'foto[]', // harus pakai [] agar terbaca array di sisi backend
                    'contents' => fopen($image->getPathname(), 'r'),
                    'filename' => $image->getClientOriginalName(),
                ];
            }

            // Kirim request ke API
            $response = $client->request('POST', env("API_BASE_URL", "http://localhost:8001") . "/api/berita", [
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
                    'Authorization' => 'Bearer ' . $token
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

        } catch (BadResponseException $e) {
            $response = $e->getResponse();
            $result = json_decode($response->getBody());

            return redirect()->back()->withErrors($result->message)->withInput($request->all());
        }
    }

    public function updateBerita(Request $request)
    {
        try {
            $client = new Client();
            $token = Session::get('api-token');

            $multipart = [
                [
                    'name' => 'nama',
                    'contents' => $request->nama
                ],
                [
                    'name' => 'isAccepted',
                    'contents' => $request->isAccepted
                ],
                [
                    'name' => 'judul',
                    'contents' => $request->judul
                ],
                [
                    'name' => 'isi',
                    'contents' => $request->isi
                ],
            ];

            $images = $request->file('foto');
            if (!empty($images)) {
                foreach ($images as $image) {
                    $multipart[] = [
                        'name' => 'foto[]', // untuk multiple image, gunakan foto[]
                        'contents' => fopen($image->getPathname(), 'r'),
                        'filename' => $image->getClientOriginalName(),
                    ];
                }
            }

            $response = $client->request('POST', env("API_BASE_URL", "http://localhost:8001") . "/api/berita/{$request->id}?_method=PUT", [
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

            return redirect()->back()->withErrors($result->message)->withInput($request->all());
        }
    }

    public function updatePengumuman(Request $request)
    {
        try {
            $client = new Client();
            $token = Session::get('api-token');

            $response = $client->request('POST', env("API_BASE_URL", "http://localhost:8001") . "/api/pengumuman/$request->id?_method=PUT", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token
                ],
                'multipart' => [
                    [
                        'name' => 'nama',
                        'contents' => $request->nama
                    ],
                    [
                        'name' => 'isAccepted',
                        'contents' => $request->isAccepted
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

        } catch (BadResponseException $e) {
            $response = $e->getResponse();
            $result = json_decode($response->getBody());

            return redirect()->back()->withErrors($result->message)->withInput($request->all());
        }
    }

    public function acceptBerita($id)
    {
        try {
            $client = new Client();
            $token = Session::get('api-token');

            $response = $client->request('PUT', env("API_BASE_URL", "http://localhost:8001") . "/api/berita/$id/ceklis", [
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

    public function acceptPengumuman($id)
    {
        try {
            $client = new Client();
            $token = Session::get('api-token');

            $response = $client->request('PUT', env("API_BASE_URL", "http://localhost:8001") . "/api/pengumuman/$id/ceklis", [
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

    public function checkAspirasi($id)
    {
        try {
            $client = new Client();
            $token = Session::get('api-token');

            $response = $client->request('PUT', env("API_BASE_URL", "http://localhost:8001") . "/api/aspirasi/$id", [
                'headers' => [
                    'Authorization' => 'Bearer '.$token
                ]
            ]);

            $responseBody = json_decode($response->getBody());
            return redirect()->back()->with('success', $responseBody->message);

        } catch (BadResponseException $e){
            $response = $e->getResponse();
            $result = json_decode($response->getBody());

            return redirect()->back()->withErrors($result->message);
        }
    }

    public function deleteBerita($id)
    {
        try {
            $client = new Client();
            $token = Session::get('api-token');

            $response = $client->request("DELETE", env("API_BASE_URL", "http://localhost:8001") . "/api/berita/$id", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                ],
            ]);

            $responseBody = json_decode($response->getBody());

            return redirect()->back()->with('success', $responseBody->message);
        } catch (BadResponseException $e) {
            $response = $e->getResponse();
            $result = json_decode($response->getBody());

            return redirect()->back()->withErrors($result->message);
        }
    }

    public function deletePengumuman($id)
    {
        try {
            $client = new Client();
            $token = Session::get('api-token');

            $response = $client->request("DELETE", env("API_BASE_URL", "http://localhost:8001") . "/api/pengumuman/$id", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                ],
            ]);

            $responseBody = json_decode($response->getBody());

            return redirect()->back()->with('success', $responseBody->message);
        } catch (BadResponseException $e) {
            $response = $e->getResponse();
            $result = json_decode($response->getBody());

            return redirect()->back()->withErrors($result->message);
        }
    }

    public function deleteAspirasi($id)
    {
        try {
            $client = new Client();
            $token = Session::get('api-token');

            $response = $client->request("DELETE", env("API_BASE_URL", "http://localhost:8001") . "/api/aspirasi/$id", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                ],
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

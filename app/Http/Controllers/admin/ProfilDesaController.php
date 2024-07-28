<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;
use Parsedown;

class ProfilDesaController extends Controller
{
    public function index(){
        $client = new Client;

        $response1 = $client->request("GET", env("API_BASE_URL", "http://localhost:8001") . "/api/data-desa/1");
        $response2 = $client->request("GET", env("API_BASE_URL", "http://localhost:8001") . "/api/v-misi");
        $response3 = $client->request("GET", env("API_BASE_URL", "http://localhost:8001") . "/api/data-desa/2");

        $profilDesa = json_decode($response1->getBody());
        $vmData = json_decode($response2->getBody());
        $visi = $vmData->data[0];
        $misi = $vmData->data;
        $sejarahDesa = json_decode($response3->getBody());

        return view("adminProfilDesa", [
            "profilDesa" => $profilDesa,
            "sejarahDesa" => $sejarahDesa,
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

            $parsedown = new Parsedown();

            if (!empty($image)) {
                $multipart = [
                    [
                        'name'     => 'foto',
                        'contents' => fopen($image->getPathname(), 'r'),
                        'filename' => $image->getClientOriginalName(),
                    ],
                    [
                        'name'     => 'penjelasan_raw',
                        'contents' => $request->penjelasan
                    ],
                    [
                        'name'     => 'penjelasan',
                        'contents' => $parsedown->text(nl2br(htmlspecialchars($request->penjelasan))),
                    ]
                ];
            } else {
                $multipart = [
                    [
                        'name'     => 'penjelasan_raw',
                        'contents' => $request->penjelasan
                    ],
                    [
                        'name'     => 'penjelasan',
                        'contents' => $parsedown->text(nl2br(htmlspecialchars($request->penjelasan))),
                    ]
                ];
            }

            $response = $client->request("POST", env("API_BASE_URL", "http://localhost:8001") . "/api/data-desa/1?_method=PUT", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
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

    public function updateVisiDesa(Request $request)
    {
        try {
            $client = new Client();
            $token = Session::get('api-token');
            $id = $request->id;

            $response = $client->request("POST", env("API_BASE_URL", "http://localhost:8001") . "/api/v-misi/$id?_method=PUT", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                ],
                'multipart' => [
                    [
                        'name'     => 'isi_poin',
                        'contents' => $request->isi_poin,
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

    public function updateMisiDesa(Request $request)
    {
        try {
            $client = new Client();
            $token = Session::get('api-token');
            $id = $request->id;

            $response = $client->request("POST", env("API_BASE_URL", "http://localhost:8001") . "/api/v-misi/$id?_method=PUT", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                ],
                'multipart' => [
                    [
                        'name'     => 'isi_poin',
                        'contents' => $request->isi_poin,
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

    public function updateSejarahDesa(Request $request)
    {
        try {
            $client = new Client();
            $image = $request->file('foto');
            $token = Session::get('api-token');

            $parsedown = new Parsedown();

            if (!empty($image)) {
                $multipart = [
                    [
                        'name'     => 'foto',
                        'contents' => fopen($image->getPathname(), 'r'),
                        'filename' => $image->getClientOriginalName(),
                    ],
                    [
                        'name'     => 'penjelasan_raw',
                        'contents' => $request->penjelasan
                    ],
                    [
                        'name'     => 'penjelasan',
                        'contents' => $parsedown->text(nl2br(htmlspecialchars($request->penjelasan))),
                    ]
                ];
            } else {
                $multipart = [
                    [
                        'name'     => 'penjelasan_raw',
                        'contents' => $request->penjelasan
                    ],
                    [
                        'name'     => 'penjelasan',
                        'contents' => $parsedown->text(nl2br(htmlspecialchars($request->penjelasan))),
                    ]
                ];
            }

            $response = $client->request("POST", env("API_BASE_URL", "http://localhost:8001") . "/api/data-desa/2?_method=PUT", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
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

    public function tambahMisiDesa(Request $request)
    {
        try {
            $client = new Client();
            $token = Session::get('api-token');

            $response = $client->request("POST", env("API_BASE_URL", "http://localhost:8001") . "/api/v-misi", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                ],
                'multipart' => [
                    [
                        'name'     => 'isi_poin',
                        'contents' => $request->isi_poin,
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

    public function deleteMisiDesa($id)
    {
        try {
            $client = new Client();
            $token = Session::get('api-token');

            $response = $client->request("DELETE", env("API_BASE_URL", "http://localhost:8001") . "/api/v-misi/$id", [
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

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Psr7\Request as GuzzleRequest;
use GuzzleHttp\Psr7\Response as GuzzleResponse;

class PemerintahanDesaController extends Controller
{
    public function index(Request $request)
    {
        $client = new Client();

        $response1 = $client->request('GET', env("API_BASE_URL", "http://localhost:8001") . "/api/perangkat-desa");
        $response2 = $client->request('GET', env("API_BASE_URL", "http://localhost:8001") . "/api/lembaga?nama=$request->nama");
        $response3 = $client->request('GET', env("API_BASE_URL", "http://localhost:8001") . "/api/data-desa/3");

        $perangkatDesa = json_decode($response1->getBody());
        $lembagaDesa = json_decode($response2->getBody());
        $strukturOrg = json_decode($response3->getBody());

        return view('adminPemerintahan', [
            "perangkatDesa" => $perangkatDesa,
            "lembagaDesa" => $lembagaDesa,
            "strukturOrg" => $strukturOrg,
            "nama" => $request->nama
        ]);
    }

    public function tambahPerangkatDesa(Request $request)
    {
        try {
            $client = new Client();
            $token = Session::get('api-token');
            $image = $request->file('foto');
            if (empty($image)) {
                $guzzleRequest = new GuzzleRequest('GET', env("API_BASE_URL", "http://localhost:8001") . "/api/perangkat-desa");
                $guzzleResponse = new GuzzleResponse(400, [], json_encode(['message' => 'Foto harus diisi!']));

                throw new BadResponseException('Foto harus diisi!', $guzzleRequest, $guzzleResponse);
            }

            $dataJabatan = explode('|', $request->jabatan);
            if (empty($dataJabatan[1])) {
                $guzzleRequest = new GuzzleRequest('GET', env("API_BASE_URL", "http://localhost:8001") . "/api/perangkat-desa");
                $guzzleResponse = new GuzzleResponse(400, [], json_encode(['message' => 'Jabatan harus diisi!']));

                throw new BadResponseException('Jabatan harus diisi!', $guzzleRequest, $guzzleResponse);
            }
            $jabatan = $dataJabatan[1];
            $jabatanId = $dataJabatan[0];

            $response = $client->request("POST", env("API_BASE_URL", "http://localhost:8001") . "/api/perangkat-desa", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                ],
                'multipart' => [
                    [
                        'name'     => 'nama',
                        'contents' => $request->nama,
                    ],
                    [
                        'name' => 'jabatan',
                        'contents' => $jabatan,
                    ],
                    [
                        'name' => 'jabatan_id',
                        'contents' => $jabatanId,
                    ],
                    [
                        'name' => 'kontak',
                        'contents' => $request->kontak,
                    ],
                    [
                        'name'     => 'foto',
                        'contents' => fopen($image->getPathname(), 'r'),
                        'filename' => $image->getClientOriginalName(),
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

    public function tambahLembagaDesa(Request $request)
    {
        try {
            $client = new Client();
            $token = Session::get('api-token');

            $response = $client->request("POST", env("API_BASE_URL", "http://localhost:8001") . "/api/lembaga", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                ],
                'multipart' => [
                    [
                        'name'     => 'nama',
                        'contents' => $request->nama,
                    ],
                    [
                        'name' => 'alamat',
                        'contents' => $request->alamat,
                    ],
                    [
                        'name' => 'kontak',
                        'contents' => $request->kontak,
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

    public function updateLembagaDesa(Request $request)
    {
        try {
            $client = new Client();
            $token = Session::get('api-token');
            $id = $request->id;

            $response = $client->request("POST", env("API_BASE_URL", "http://localhost:8001") . "/api/lembaga/$id?_method=PUT", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                ],
                'multipart' => [
                    [
                        'name'     => 'nama',
                        'contents' => $request->nama,
                    ],
                    [
                        'name' => 'alamat',
                        'contents' => $request->alamat,
                    ],
                    [
                        'name' => 'kontak',
                        'contents' => $request->kontak,
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

    public function updateStrukturDesa(Request $request)
    {
        try {
            $client = new Client();
            $image = $request->file('foto');
            $token = Session::get('api-token');

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

            $response = $client->request("POST", env("API_BASE_URL", "http://localhost:8001") . "/api/data-desa/3?_method=PUT", [
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

    public function updatePerangkatDesa(Request $request)
    {
        try {
            $client = new Client();
            $token = Session::get('api-token');
            $image = $request->file('foto');
            $id = $request->id;
            $dataJabatan = explode('|', $request->jabatan);
            $jabatan = $dataJabatan[1];
            $jabatanId = $dataJabatan[0];

            if (!empty($image)) {
                $multipart = [
                    [
                        'name'     => 'foto',
                        'contents' => fopen($image->getPathname(), 'r'),
                        'filename' => $image->getClientOriginalName(),
                    ],
                    [
                        'name'     => 'nama',
                        'contents' => $request->nama,
                    ],
                    [
                        'name' => 'jabatan',
                        'contents' => $jabatan,
                    ],
                    [
                        'name' => 'jabatan_id',
                        'contents' => $jabatanId,
                    ],
                    [
                        'name' => 'kontak',
                        'contents' => $request->kontak,
                    ],
                ];
            } else {
                $multipart = [
                    [
                        'name'     => 'nama',
                        'contents' => $request->nama,
                    ],
                    [
                        'name' => 'jabatan',
                        'contents' => $jabatan,
                    ],
                    [
                        'name' => 'jabatan_id',
                        'contents' => $jabatanId,
                    ],
                    [
                        'name' => 'kontak',
                        'contents' => $request->kontak,
                    ],
                ];
            }

            $response = $client->request("POST", env("API_BASE_URL", "http://localhost:8001") . "/api/perangkat-desa/$id?_method=PUT", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                ],
                'multipart' => $multipart,
            ]);

            $responseBody = json_decode($response->getBody());

            return redirect()->back()->with('success', $responseBody->message);
        } catch (BadResponseException $e) {
            $response = $e->getResponse();
            $result = json_decode($response->getBody());

            return redirect()->back()->withErrors($result->message)->withInput($request->all());
        }
    }

    public function deletePerangkatDesa($id)
    {
        try {
            $client = new Client();
            $token = Session::get('api-token');

            $response = $client->request("DELETE", env("API_BASE_URL", "http://localhost:8001") . "/api/perangkat-desa/$id", [
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

    public function deleteLembagaDesa($id)
    {
        try {
            $client = new Client();
            $token = Session::get('api-token');

            $response = $client->request("DELETE", env("API_BASE_URL", "http://localhost:8001") . "/api/lembaga/$id", [
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

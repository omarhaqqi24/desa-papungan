<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index() {
        if (Session::has('api-token')) {
            return back();
        }
        return view('adminLogin');
    }

    public function login(Request $request)  {
        $client = new Client();
        $parameters = [
            'username' => $request->username,
            'password' => $request->password
        ];

        $jsonData = json_encode($parameters);

        try {
            $response = $client->request('POST', env("API_BASE_URL", "http://localhost:8001") . "/api/login", [
                "headers" => ["Content-type" => "application/json"],
                "body" => $jsonData
            ]);

            $result = json_decode($response->getBody());
            Session::put('api-token', $result->data->token);
            return redirect()->route('data-desa.index');
        } catch (BadResponseException $e) {
            $response = $e->getResponse();
            $result = json_decode($response->getBody());
            return redirect()->route('auth.index')->withErrors($result->message)->withInput($request->all());
        }
    }

    public function logout(Request $request) {
        $client = new Client();
        $token = Session::get('api-token');
        // dd($token);
        // return;

        try {
            $response = $client->request('POST', env("API_BASE_URL", "http://localhost:8001") . "/api/logout", [
                "headers" => [
                    "Authorization" => 'Bearer ' . $token,
                ]
            ]);
            Session::forget('api-token');
            return redirect('/login');
        } catch (BadResponseException $e) {
            return;
        }
    }
}

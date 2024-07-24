<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index() {
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
}

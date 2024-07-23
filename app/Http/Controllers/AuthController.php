<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use Illuminate\Http\Request;

class AuthController extends Controller
{
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
        } catch (BadResponseException $th) {
            $response = $th->getResponse();
            print_r(json_decode($response->getBody())->message->password[0]);
            return;
        }
        

        $resp = json_decode($response->getBody());
        return redirect('/adminLogin')->with('success', $resp->message);
    }
}

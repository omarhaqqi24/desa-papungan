<?php

namespace App\Http\Controllers\api;

use App\Classes\ApiResponseClass;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function check_login(Request $request)
    {
        $email      = $request->email;
        $password   = $request->password;

        if(Auth::guard('web')->attempt(['email' => $email, 'password' => $password])) {
            $token = $request->user()->createToken('admin-token', ['admin']);
            return ApiResponseClass::sendResponse(['token' => $token->plainTextToken], 'Otentikasi berhasil!', 200);
        } else {
            return ApiResponseClass::sendError('Otentikasi gagal!', 401);
        }

    }
}

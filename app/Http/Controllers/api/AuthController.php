<?php

namespace App\Http\Controllers\api;

use App\Classes\ApiResponseClass;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return ApiResponseClass::sendError($validator->errors(), 422);
        }

        if(!Auth::attempt($request->only(['username', 'password']))) {
            return ApiResponseClass::sendError('Kredensial tidak sesuai!', 401);
        }

        $dataUser = User::where('username', $request->username)->first();
        $token = [
            'token' => $dataUser->createToken('access-token')->plainTextToken,
        ];
        return ApiResponseClass::sendResponse($token, 'Otentikasi Berhasil!', 200);
    }

    public function logout(Request $request){
        $user = $request->user();
        $user->currentAccessToken()->delete();
        return ApiResponseClass::sendResponse(null, 'Token berhasil dihapus!', 200);
    }
}

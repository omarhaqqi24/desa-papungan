<?php

namespace App\Classes;

class ApiResponseClass
{
    public static function sendResponse($result , $message ,$code=200) {
        $response = [
            'success' => true,
            ...(!empty($message) ? ['message' => $message] : []),
            ...(!empty($result) ? ['data' => $result] : [])
        ];

        return response()->json($response, $code);
    }

    public static function sendError($message, $code) {
        $response = [
            'success' => false,
            'message' => $message
        ];

        return response()->json($response, $code);
    }
}

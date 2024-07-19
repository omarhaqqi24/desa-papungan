<?php

namespace App\Http\Controllers\api;

use App\Classes\ApiResponseClass;
use App\Http\Controllers\Controller;
use App\Http\Resources\AspirasiCollection;
use App\Http\Resources\AspirasiResource;
use App\Models\Aspirasi;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class AspirasiController extends Controller
{
    public function getAll()
    {
        $aspirasis = Aspirasi::all();
        $resource = new AspirasiCollection($aspirasis);
        return ApiResponseClass::sendResponse($resource, 'Data aspirasi berhasil diambil!', 200);
    }

    public function store(Request $request)
    {
        $validator = FacadesValidator::make($request->all(), [
            'isi' => 'required'
        ]);

        if ($validator->fails()) {
            return ApiResponseClass::sendError($validator->errors(), 422);
        }

        $aspirasi = Aspirasi::create([
            'judul' => $request->judul,
            'isi' => $request->isi
        ]);

        $resource = new AspirasiResource($aspirasi);

        return ApiResponseClass::sendResponse($resource, 'Data aspirasi berhasil ditambahkan!', 201);
    }
}

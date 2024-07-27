<?php

namespace App\Http\Controllers\api;

use App\Classes\ApiResponseClass;
use App\Http\Controllers\Controller;
use App\Http\Resources\FotoUmkmCollection;
use App\Models\FotoUmkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FotoUmkmController extends Controller
{
    public function store(Request $request, $umkm_id)
    {
        $validator = Validator::make($request->all(), [
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //upload image
        $image = $request->file('foto');
        $image->storeAs('public/foto-umkm', $image->hashName());

        //create post
        $foto_umkm = FotoUmkm::create([
            'foto'      => $image->hashName(),
            'umkm_id'   => $umkm_id
        ]);

        $resource = new FotoUmkmCollection($foto_umkm);
        return ApiResponseClass::sendResponse($resource, 'Data foto UMKM berhasil ditambahkan', 201);
    }

    public function destroy(string $id)
    {
        $isDeleted = FotoUmkm::destroy(intval($id));
        if (!$isDeleted){
            return ApiResponseClass::sendError('Data foto UMKM gagal dihapus!', 400);
        }

        return ApiResponseClass::sendResponse(null, 'Data foto UMKM berhasil dihapus!', 200);
    }
}

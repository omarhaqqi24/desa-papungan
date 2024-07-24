<?php

namespace App\Http\Controllers\api;

use App\Classes\ApiResponseClass;
use App\Http\Controllers\Controller;
use App\Http\Resources\LembagaCollection;
use App\Http\Resources\LembagaResource;
use App\Models\Lembaga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LembagaController extends Controller
{
    public function getAll(Request $request)
    {
        $lembagas = Lembaga::orderBy('nama', 'ASC')->get();
        $resources = (new LembagaCollection($lembagas));

        return ApiResponseClass::sendResponse($resources, 'Data lembaga berhasil diambil!', 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'alamat' => 'required'
        ]);

        if ($validator->fails()) {
            return ApiResponseClass::sendError($validator->errors(), 422);
        }

        $lembaga = Lembaga::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'kontak' => $request->kontak
        ]);
        $resource = new LembagaResource($lembaga);

        return ApiResponseClass::sendResponse($resource, 'Data lembaga berhasil ditambahkan!', 201);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'alamat' => 'required'
        ]);

        if ($validator->fails()) {
            return ApiResponseClass::sendError($validator->errors(), 422);
        }

        $lembaga = Lembaga::where('id', $id)->first();
        if (!$lembaga){
            return ApiResponseClass::sendError('Data lembaga tidak ditemukan!', 404);
        }

        $lembaga->update([
            'nama'  => $request->nama,
            'alamat'  => $request->alamat,
            'kontak'  => $request->kontak
        ]);
        $lembaga->save();

        $resource = new LembagaResource($lembaga);
        return ApiResponseClass::sendResponse($resource, 'Data lembaga berhasil diperbarui!', 200);
    }

    public function destroy(string $id)
    {
        $isDeleted = Lembaga::destroy($id);
        if (!$isDeleted){
            return ApiResponseClass::sendError('Data lembaga gagal dihapus!', 400);
        }

        return ApiResponseClass::sendResponse(null, 'Data lembaga berhasil dihapus!', 200);
    }
}

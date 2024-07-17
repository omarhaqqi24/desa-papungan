<?php

namespace App\Http\Controllers\api;

use App\Classes\ApiResponseClass;
use App\Http\Controllers\Controller;
use App\Http\Resources\PerangkatDesaCollection;
use App\Http\Resources\PerangkatDesaResource;
use App\Models\PerangkatDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PerangkatDesaController extends Controller
{
    public function getAll()
    {
        $perangkats = PerangkatDesa::all();
        $resource = new PerangkatDesaCollection($perangkats);
        return ApiResponseClass::sendResponse($resource, 'Data perangkat desa berhasil diambil!', 200); 
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama' => 'required',
            'jabatan' => 'required',
        ]);

        if ($validator->fails()) {
            return ApiResponseClass::sendError($validator->errors(), 422);
        }

        $image = $request->file('foto');
        $image->storeAs('public/perangkat-desa', $image->hashName());

        $perangkat = PerangkatDesa::create([
            'foto' => $image->hashName(),
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
        ]);
        $resource = new PerangkatDesaResource($perangkat);

        return ApiResponseClass::sendResponse($resource, 'Data perangkat desa berhasil ditambahkan', 201);
    }

    public function destroy(string $id)
    {
        $isDeleted = PerangkatDesa::destroy(intval($id));
        if (!$isDeleted){
            return ApiResponseClass::sendError('Data perangkat desa gagal dihapus!', 400);
        }
        return ApiResponseClass::sendResponse(null, 'Data perangkat desa berhasil dihapus!', 200);
    }
}

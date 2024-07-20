<?php

namespace App\Http\Controllers\api;

use App\Classes\ApiResponseClass;
use App\Http\Controllers\Controller;
use App\Http\Resources\UmkmCollection;
use App\Http\Resources\UmkmResource;
use App\Models\JenisUmkm;
use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UmkmController extends Controller
{
    public function getAll(Request $request)
    {
        $perPage = intval($request->query('size'));
        $umkms = Umkm::paginate($perPage);
        $resources = (new UmkmCollection($umkms))->response()->getData();

        return ApiResponseClass::sendResponse($resources, '', 200);
    }

    public function getById($id)
    {
        $umkm = Umkm::where('id', $id)->first();
        if (!$umkm){
            return ApiResponseClass::sendError('Data UMKM tidak ditemukan!', 404);
        }

        $resource = new UmkmResource($umkm->load('jenis_umkm', 'foto_umkm'));
        return ApiResponseClass::sendResponse($resource, 'Data UMKM berhasil diambil!', 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'lat' => 'required',
            'long' => 'required',
        ]);

        if ($validator->fails()) {
            return ApiResponseClass::sendError($validator->errors(), 422);
        }

        $umkm = Umkm::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'alamat' => $request->alamat,
            'kontak' => $request->kontak,
            'jam_buka' => $request->jam_buka,
            'lat' => $request->lat,
            'long' => $request->long,
            'no_nib' => $request->no_nib,
            'no_pirt' => $request->no_pirt,
            'no_halal' => $request->no_halal,
            'no_bpom' => $request->no_bpom
        ]);

        $jenises = $request->jenis;
        foreach ($jenises as $jenis){
            JenisUmkm::create([
                'jenis' => $jenis,
                'umkm_id' => $umkm->id
            ]);
        }

        $resource = new UmkmResource($umkm->load('jenis_umkm'));
        return ApiResponseClass::sendResponse($resource, 'Data UMKM berhasil ditambahkan!', 201);
    }
}

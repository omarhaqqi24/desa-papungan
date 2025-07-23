<?php

namespace App\Http\Controllers\api;

use App\Classes\ApiResponseClass;
use App\Http\Controllers\Controller;
use App\Http\Resources\UmkmCollection;
use App\Http\Resources\UmkmResource;
use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UmkmController extends Controller
{
    public function getAll(Request $request)
    {
        $nama_param = $request->nama;

        if (!empty($nama_param)) {
            $umkms = Umkm::where('nama', 'LIKE', "%{$nama_param}%")->get();
        } else {
            $umkms = Umkm::all();
        }

        $resources = new UmkmCollection($umkms);

        return ApiResponseClass::sendResponse([
            'resource' => $resources
        ], 'Data UMKM berhasil diambil!', 200);
    }

    public function getById($id)
    {
        $umkm = Umkm::where('id', $id)->first();
        if (!$umkm) {
            return ApiResponseClass::sendError('Data UMKM tidak ditemukan!', 404);
        }

        $resource = new UmkmResource($umkm);
        return ApiResponseClass::sendResponse($resource, 'Data UMKM berhasil diambil!', 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'deskripsi' => 'required',
            'alamat' => 'required',
            'kontak' => 'required',
            'jam_buka' => 'required',
            'lat' => 'required',
            'long' => 'required',
            'url_map' => 'nullable|string',
            'no_nib' => 'required',
            'no_bpom' => 'required'
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
            'url_map' => $request->url_map ?? null,
            'no_nib' => $request->no_nib,
            'no_bpom' => $request->no_bpom
        ]);

        $resource = new UmkmResource(resource: $umkm);
        return ApiResponseClass::sendResponse($resource, 'Data UMKM berhasil ditambahkan!', 201);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'deskripsi' => 'required',
            'alamat' => 'required',
            'kontak' => 'required',
            'jam_buka' => 'required',
            'lat' => 'required',
            'long' => 'required',
            'url_map' => 'nullable|string',
            'no_nib' => 'required',
            'no_bpom' => 'required'
        ]);

        if ($validator->fails()) {
            return ApiResponseClass::sendError($validator->errors(), 422);
        }

        $umkm = Umkm::where('id', $id)->first();
        if (!$umkm) {
            return ApiResponseClass::sendError('Data UMKM tidak ditemukan!', 404);
        }

        $umkm->update([
            'nama'  => $request->nama,
            'deskripsi'  => $request->deskripsi,
            'alamat'  => $request->alamat,
            'kontak'  => $request->kontak,
            'jam_buka'  => $request->jam_buka,
            'lat'  => floatval($request->lat),
            'long'  => floatval($request->long),
            'url_map' => $request->url_map ?? null,
            'no_nib'  => $request->no_nib,
            'no_bpom'  => $request->no_bpom
        ]);
        $umkm->save();

        $resource = new UmkmResource($umkm);
        return ApiResponseClass::sendResponse($resource, 'Data UMKM berhasil diperbarui!', 200);
    }

    public function destroy(string $id)
    {
        $isDeleted = Umkm::destroy(intval($id));
        if (!$isDeleted) {
            return ApiResponseClass::sendError('Gagal menghapus data UMKM!', 400);
        }

        return ApiResponseClass::sendResponse(null, 'Data UMKM berhasil dihapus!', 200);
    }
}

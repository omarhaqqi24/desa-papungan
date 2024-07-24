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
        $umkms = Umkm::all();
        $resources = (new UmkmCollection($umkms));

        $jenises = JenisUmkm::select('jenis')->groupBy('jenis')->get();

        return ApiResponseClass::sendResponse([
            'list' => $jenises,
            'resource' => $resources
        ], 'Data UMKM berhasil diambil!', 200);
    }

    public function getById($id)
    {
        $umkm = Umkm::where('id', $id)->first();
        if (!$umkm){
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
            'no_nib' => 'required',
            'no_pirt' => 'required',
            'no_halal' => 'required',
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
            'no_nib' => 'required',
            'no_pirt' => 'required',
            'no_halal' => 'required',
            'no_bpom' => 'required'
        ]);

        if ($validator->fails()) {
            return ApiResponseClass::sendError($validator->errors(), 422);
        }

        $umkm = Umkm::where('id', $id)->first();
        if (!$umkm){
            return ApiResponseClass::sendError('Data UMKM tidak ditemukan!', 404);
        }
        
        $isDeleted = JenisUmkm::where('umkm_id', intval($id))->delete();
        if (!$isDeleted){
            return ApiResponseClass::sendError('Gagal memperbarui data jenis UMKM!', 400);
        }

        foreach ($request->jenis as $jenis){
            JenisUmkm::create([
                'jenis' => $jenis,
                'umkm_id' => $id
            ]);
        }

        $umkm->update([
            'nama'  => $request->nama,
            'deskripsi'  => $request->deskripsi,
            'alamat'  => $request->alamat,
            'kontak'  => $request->kontak,
            'jam_buka'  => $request->jam_buka,
            'lat'  => floatval($request->lat),
            'long'  => floatval($request->long),
            'no_nib'  => $request->no_nib,
            'no_pirt'  => $request->no_pirt,
            'no_halal'  => $request->no_halal,
            'no_bpom'  => $request->no_bpom
        ]);
        $umkm->save();

        $resource = new UmkmResource($umkm->load('jenis_umkm'));
        return ApiResponseClass::sendResponse($resource, 'Data UMKM berhasil diperbarui!', 200);
    }

    public function destroy(string $id)
    {
        $isDeleted = JenisUmkm::where('umkm_id', intval($id))->delete();
        if (!$isDeleted){
            return ApiResponseClass::sendError('Gagal menghapus data jenis UMKM!', 400);
        }
        
        $isDeleted = Umkm::destroy(intval($id));
        if (!$isDeleted){
            return ApiResponseClass::sendError('Gagal menghapus data UMKM!', 400);
        }

        return ApiResponseClass::sendResponse(null, 'Data UMKM berhasil dihapus!', 200);
    }
}

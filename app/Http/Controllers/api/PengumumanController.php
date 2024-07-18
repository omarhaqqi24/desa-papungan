<?php

namespace App\Http\Controllers\api;

use App\Classes\ApiResponseClass;
use App\Http\Controllers\Controller;
use App\Http\Resources\PengumumanCollection;
use App\Http\Resources\PengumumanResource;
use App\Models\Pengumuman;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class PengumumanController extends Controller
{
    public function getAll()
    {
        $pengumumans = Pengumuman::all();
        $resource = new PengumumanCollection($pengumumans);
        return ApiResponseClass::sendResponse($resource, 'Data pengumuman berhasil diambil!', 200);
    }

    public function store(Request $request)
    {
        $validator = FacadesValidator::make($request->all(), [
            'judul' => 'required',
            'isi' => 'required',
        ]);

        if ($validator->fails()) {
            return ApiResponseClass::sendError($validator->errors(), 422);
        }

        $pengumuman = Pengumuman::create([
            'judul' => $request->judul,
            'isi' => $request->isi
        ]);
        $resource = new PengumumanResource($pengumuman);

        return ApiResponseClass::sendResponse($resource, 'Data pengumuman berhasil ditambahkan', 201);
    }

    public function update(Request $request, $id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        if (!$pengumuman) {
            return ApiResponseClass::sendError('Data pengumuman tidak ditemukan!', 400);
        }

        if (!empty($request->judul)){
            $pengumuman->update([
                'judul'  => $request->judul,
            ]);
        }
        if (!empty($request->isi)){
            $pengumuman->update([
                'isi'  => $request->isi,
            ]);
        }
        if (!empty($request->isAccepted)){
            $pengumuman->update([
                'isAccepted'  => intval($request->isAccepted),
            ]);
        }
        $pengumuman->save();

        $resource = new PengumumanResource($pengumuman);

        return ApiResponseClass::sendResponse($resource, 'Data pengumuman berhasil diperbarui!', 200);
    }

    public function destroy(string $id)
    {
        $isDeleted = Pengumuman::destroy(intval($id));
        if(!$isDeleted){
            return ApiResponseClass::sendError('Data pengumuman gagal dihapus!', 400);
        }

        return ApiResponseClass::sendResponse(null, 'Data pengumuman berhasil dihapus!', 200);
    }
}

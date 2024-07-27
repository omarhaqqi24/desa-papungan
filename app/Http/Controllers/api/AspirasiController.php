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
    public function getAll(Request $request)
    {
        if (!empty($request->judul)){
            $aspirasis = Aspirasi::where('judul', 'LIKE', "%{$request->judul}%")
                ->orderBy('isChecked', 'ASC')
                ->orderBy('created_at', 'DESC')
                ->get();
        } else {
            $aspirasis = Aspirasi::orderBy('isChecked', 'ASC')->orderBy('created_at', 'DESC')->get();
        }

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

        if (!empty($request->foto)){
            $image = $request->file('foto');
            $image->storeAs('public/aspirasi', $image->hashName());
        }

        $aspirasi = Aspirasi::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'nama' => $request->nama,
            'foto' => (!empty($request->foto))?$image->hashName():''
        ]);

        $resource = new AspirasiResource($aspirasi);

        return ApiResponseClass::sendResponse($resource, 'Data aspirasi berhasil ditambahkan!', 201);
    }

    public function getChecked(Request $request, $id)
    {
        $validator = FacadesValidator::make($request->all(), [
            'isChecked' => 'required'
        ]);

        if ($validator->fails()) {
            return ApiResponseClass::sendError($validator->errors(), 422);
        }

        $aspirasi = Aspirasi::where('id', $id)->first();
        if (!$aspirasi){
            return ApiResponseClass::sendError('Data aspirasi tidak ditemukan!', 404);
        }

        $aspirasi->update([
            'isChecked' => intval($request->isChecked)
        ]);
        $aspirasi->save();

        $resource = new AspirasiResource($aspirasi);
        return ApiResponseClass::sendResponse($resource, 'Data aspirasi berhasil diperbarui!', 200);
    }

    public function destroy(string $id)
    {
        $isDeleted = Aspirasi::destroy(intval($id));
        if(!$isDeleted){
            return ApiResponseClass::sendError('Data aspirasi gagal dihapus!', 400);
        }

        return ApiResponseClass::sendResponse(null, 'Data aspirasi berhasil dihapus!', 200);
    }
}

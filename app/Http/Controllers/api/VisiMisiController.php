<?php

namespace App\Http\Controllers\api;

use App\Classes\ApiResponseClass;
use App\Http\Controllers\Controller;
use App\Http\Resources\VisiMisiCollection;
use App\Http\Resources\VisiMisiResource;
use App\Models\VisiMisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class VisiMisiController extends Controller
{
    public function getAll(){
        $v_misis = DB::table('visi_misis')->orderByRaw("FIELD(kategori, \"visi\", \"misi\")")->get();
        $resource = new VisiMisiCollection($v_misis);
        return ApiResponseClass::sendResponse($resource, 'Data visi misi berhasil diambil!', 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'isi_poin' => 'required',
        ]);

        if ($validator->fails()) {
            return ApiResponseClass::sendError($validator->errors(), 422);
        }

        $visi_misi = VisiMisi::create([
            'kategori' => 'misi',
            'isi_poin' => $request->isi_poin
        ]);

        $resource = new VisiMisiResource($visi_misi);
        return ApiResponseClass::sendResponse($resource, 'Data misi berhasil ditambahkan!', 200);
    }

    public function update(Request $request, $id)
    {   
        $validator = Validator::make($request->all(), [
            'isi_poin' => 'required',
        ]);

        if ($validator->fails()) {
            return ApiResponseClass::sendError($validator->errors(), 422);
        }

        $visi_misi = VisiMisi::where('id', $id)->first();
        if (!$visi_misi){
            return ApiResponseClass::sendError('Data visi/misi tidak ditemukan!', 404);
        }

        $visi_misi->update([
            'isi_poin' => $request->isi_poin
        ]);
        $visi_misi->save();

        $resource = new VisiMisiResource($visi_misi);
        return ApiResponseClass::sendResponse($resource, 'Data visi/misi berhasil diperbarui!', 200);
    }

    public function destroy(string $id)
    {
        $isDeleted = VisiMisi::destroy(intval($id));
        if (!$isDeleted){
            return ApiResponseClass::sendError('Data misi gagal dihapus!', 400);
        }

        return ApiResponseClass::sendResponse(null, 'Data misi berhasil dihapus!', 200);
    }
}

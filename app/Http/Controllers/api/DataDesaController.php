<?php

namespace App\Http\Controllers\api;

use App\Classes\ApiResponseClass;
use App\Http\Controllers\Controller;
use App\Http\Resources\DataDesaResource;
use App\Models\DataDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DataDesaController extends Controller
{
    public function getById($id)
    {
        $data_desa = DataDesa::where('id', $id)->first();
        if (!$data_desa){
            return ApiResponseClass::sendError('Data gagal diambil!', 400);
        }

        $resource = new DataDesaResource($data_desa);
        return ApiResponseClass::sendResponse($resource, 'Data berhasil diambil!', 200);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'penjelasan' => 'required',
            'penjelasan_raw' => 'required'
        ]);

        if ($validator->fails()) {
            return ApiResponseClass::sendError($validator->errors(), 422);
        }

        $data_desa = DataDesa::where('id', $id)->first();
        if (!$data_desa){
            return ApiResponseClass::sendError('Data tidak ditemukan', 404);
        }

        if (!empty($request->foto)){
            $image = $request->file('foto');
            $image->storeAs('public/data_desa', $image->hashName());
    
            Storage::delete('public/data_desa/'.$data_desa->foto);

            $data_desa->update(['foto' => $image->hashName()]);
        }

        $data_desa->update([
            'penjelasan' => $request->penjelasan,
            'penjelasan_raw' => $request->penjelasan_raw
        ]);

        $data_desa->save();

        $resource = new DataDesaResource($data_desa);
        return ApiResponseClass::sendResponse($resource, 'Data berhasil diperbarui!', 200);
    }
}

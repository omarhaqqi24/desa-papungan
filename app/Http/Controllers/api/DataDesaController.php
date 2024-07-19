<?php

namespace App\Http\Controllers\api;

use App\Classes\ApiResponseClass;
use App\Http\Controllers\Controller;
use App\Http\Resources\DataDesaResource;
use App\Models\DataDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $data_desa = DataDesa::where('id', $id)->first();
        if (!$data_desa){
            return ApiResponseClass::sendError('Data gagal diambil', 400);
        }

        if (!empty($request->penjelasan)){
            $data_desa->update([
                'penjelasan'  => $request->penjelasan,
            ]);
        }

        if ($request->hasFile('foto')) {

            $image = $request->file('foto');
            $image->storeAs('public/data_desa', $image->hashName());

            Storage::delete('public/data_desa/'.$data_desa->foto);

            $data_desa->update(['foto' => $image->hashName()]);
        }

        $data_desa->save();

        $resource = new DataDesaResource($data_desa);
        return ApiResponseClass::sendResponse($resource, 'Data berhasil diperbarui!', 200);
    }
}

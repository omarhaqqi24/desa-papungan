<?php

namespace App\Http\Controllers\api;

use App\Classes\ApiResponseClass;
use App\Http\Controllers\Controller;
use App\Http\Resources\PerangkatDesaCollection;
use App\Http\Resources\PerangkatDesaResource;
use App\Models\Jabatan;
use App\Models\PerangkatDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PerangkatDesaController extends Controller
{
    public function getAll()
    {
        $perangkats = PerangkatDesa::with('jabatan')
            ->join('jabatans', 'perangkat_desas.jabatan_id', '=', 'jabatans.id')
            ->orderBy('jabatans.order')
            ->select('perangkat_desas.*')
            ->get();
        
        $jabatans = Jabatan::orderBy('order', 'ASC')->get(['nama', 'order']);

        $resource = new PerangkatDesaCollection($perangkats);
        return ApiResponseClass::sendResponse([
            'list' => $jabatans,
            'resource' => $resource,
        ], 'Data perangkat desa berhasil diambil!', 200); 
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

        if (empty($request->jabatan_id)){
            if ($request->jabatan == 'Kepala Desa'){
                return ApiResponseClass::sendError('Kepala Desa hanya dapat berjumlah satu!', 400);
            }else if($request->jabatan == 'Sekretaris Desa'){
                $order = 2;
            }else if(str_contains($request->jabatan, 'Kaur')){
                $order = 3;
            }else if (str_contains($request->jabatan, 'Kasi')){
                $order = 4;
            }else if (str_contains($request->jabatan, 'Kamituwo')){
                $order = 5;
            }else if (str_contains($request->jabatan, 'Staf')){
                $order = 6;
            }else{
                $order = 7;
            }

            $jbt = Jabatan::create([
                'nama' => $request->jabatan,
                'order' => $order
            ]);
            $jbt_id = $jbt->id;

        } else {
            $jbt_id = $request->jabatan_id;
        }

        $perangkat = PerangkatDesa::create([
            'foto' => $image->hashName(),
            'nama' => $request->nama,
            'jabatan_id' => $jbt_id,
            'kontak' => $request->kontak
        ]);
        $resource = new PerangkatDesaResource($perangkat);

        return ApiResponseClass::sendResponse($resource, 'Data perangkat desa berhasil ditambahkan', 201);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama' => 'required',
            'jabatan' => 'required',
        ]);

        if ($validator->fails()) {
            return ApiResponseClass::sendError($validator->errors(), 422);
        }

        $perangkat = PerangkatDesa::where('id', $id)->first();
        if (!$perangkat) {
            return ApiResponseClass::sendError('Data perangkat tidak ditemukan!', 404);
        }

        $image = $request->file('foto');
        $image->storeAs('public/perangkat-desa', $image->hashName());

        Storage::delete('public/perangkat-desa/'.$perangkat->foto);

        if (empty($request->jabatan_id)){
            if ($request->jabatan == 'Kepala Desa'){
                return ApiResponseClass::sendError('Kepala Desa hanya dapat berjumlah satu!', 400);
            }else if($request->jabatan == 'Sekretaris Desa'){
                $order = 2;
            }else if(str_contains($request->jabatan, 'Kaur')){
                $order = 3;
            }else if (str_contains($request->jabatan, 'Kasi')){
                $order = 4;
            }else if (str_contains($request->jabatan, 'Kamituwo')){
                $order = 5;
            }else if (str_contains($request->jabatan, 'Staf')){
                $order = 6;
            }else{
                $order = 7;
            }

            $jbt = Jabatan::create([
                'nama' => $request->jabatan,
                'order' => $order
            ]);
            $jbt_id = $jbt->id;

        } else {
            $jbt_id = $request->jabatan_id;
        }

        $perangkat->update([
            'foto' => $image->hashName(),
            'nama' => $request->nama,
            'jabatan_id' => $jbt_id,
            'kontak' => $request->kontak
        ]);

        $perangkat->save();

        $resource = new PerangkatDesaResource($perangkat);
        return ApiResponseClass::sendResponse($resource, 'Data perangkat desa berhasil diperbarui!', 200);
    }

    public function destroy(string $id)
    {
        $isDeleted = PerangkatDesa::destroy(intval($id));
        if (!$isDeleted){
            return ApiResponseClass::sendError('Data perangkat desa gagal dihapus!', 400);
        }
        return ApiResponseClass::sendResponse(null, 'Data perangkat desa berhasil dihapus!', 204);
    }
}

<?php

namespace App\Http\Controllers\api;

use App\Classes\ApiResponseClass;
use App\Http\Controllers\Controller;
use App\Http\Resources\PariwisataCollection;
use App\Http\Resources\PariwisataResource;
use App\Models\Pariwisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PariwisataController extends Controller
{
    public function getAll(Request $request){
        $pariwisatas = Pariwisata::all();
        $resources = (new PariwisataCollection($pariwisatas));

        return ApiResponseClass::sendResponse($resources, '', 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'penjelasan' => 'required',
        ]);

        if ($validator->fails()) {
            return ApiResponseClass::sendError($validator->errors(), 422);
        }

        $image = $request->file('foto');
        $image->storeAs('public/pariwisata', $image->hashName());

        $pariwisata = Pariwisata::create([
            'foto' => $image->hashName(),
            'penjelasan' => $request->penjelasan
        ]);

        $resource = new PariwisataResource($pariwisata);
        return ApiResponseClass::sendResponse($resource, 'Data pariwisata berhasil ditambahkan!', 201);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'penjelasan' => 'required',
        ]);

        if ($validator->fails()) {
            return ApiResponseClass::sendError($validator->errors(), 422);
        }

        $pariwisata = Pariwisata::where('id', $id)->first();
        if (!$pariwisata){
            return ApiResponseClass::sendError('Data pariwisata tidak ditemukan!', 404);
        }

        $image = $request->file('foto');
        $image->storeAs('public/pariwisata', $image->hashName());

        Storage::delete('/public/pariwisata/'.$pariwisata->foto);

        $pariwisata->update([
            'foto' => $image->hashName(),
            'penjelasan' => $request->penjelasan
        ]);
        $pariwisata->save();

        $resource = new PariwisataResource($pariwisata);
        return ApiResponseClass::sendResponse($resource, 'Data pariwisata berhasil diperbarui!', 200);
    }

    public function destroy(string $id)
    {
        $isDeleted = Pariwisata::destroy(intval($id));
        if (!$isDeleted){
            return ApiResponseClass::sendError('Data pariwisata gagal dihapus!', 400);
        }

        return ApiResponseClass::sendResponse(null, 'Data pariwisata berhasil dihapus', 200);
    }
}

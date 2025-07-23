<?php

namespace App\Http\Controllers\api;

use App\Classes\ApiResponseClass;
use App\Http\Controllers\Controller;
use App\Http\Resources\BeritaCollection;
use App\Http\Resources\BeritaResource;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BeritaController extends Controller
{
    public function getAll(Request $request) 
    {
        $beritas = Berita::orderBy('created_at', 'DESC');

        if ($request->pub == '1'){
            $beritas = $beritas->where('isAccepted', 1);    
        } else if ($request->pub == '0'){
            $beritas = $beritas->where('isAccepted', 0);    
        }
        if (!empty($request->judul)){
            $beritas = $beritas->where('judul', 'LIKE', "%{$request->judul}%");
        }
        $beritas = $beritas->get();

        $resources = new BeritaCollection($beritas);
        return ApiResponseClass::sendResponse($resources, 'Data berita berhasil diambil!', 200);
    }

    public function getById($id) 
    {
        $berita = Berita::find($id);
        if (!$berita) {
            return ApiResponseClass::sendError('Data berita tidak ditemukan!', 400);
        }

        return ApiResponseClass::sendResponse(new BeritaResource($berita), 'Data berita berhasil diambil!', 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'foto' => 'required|array|min:1',
            'foto.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'judul' => 'required',
            'isi' => 'required',
        ]);

        if ($validator->fails()) {
            return ApiResponseClass::sendError($validator->errors(), 422);
        }

        $fileNames = [];
        foreach ($request->file('foto') as $file) {
            $file->storeAs('public/berita', $file->hashName());
            $fileNames[] = $file->hashName();
        }

        $berita = Berita::create([
            'foto' => implode(',', $fileNames),
            'nama' => $request->nama,
            'judul' => $request->judul,
            'isi' => $request->isi
        ]);

        return ApiResponseClass::sendResponse(new BeritaResource($berita), 'Data berita berhasil ditambahkan!', 201);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'isi' => 'required',
            'foto.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($validator->fails()) {
            return ApiResponseClass::sendError($validator->errors(), 422);
        }

        $berita = Berita::find($id);
        if (!$berita) {
            return ApiResponseClass::sendError('Data berita tidak ditemukan!', 404);
        }

        $fileNames = $berita->foto; // existing foto (sudah array dari accessor)

        // Jika ada upload baru, hapus yang lama dan ganti
        if ($request->hasFile('foto')) {
            foreach ($fileNames as $oldFile) {
                Storage::delete('public/berita/' . $oldFile);
            }

            $fileNames = [];
            foreach ($request->file('foto') as $file) {
                $file->storeAs('public/berita', $file->hashName());
                $fileNames[] = $file->hashName();
            }

            $berita->foto = implode(',', $fileNames);
        }

        $berita->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'nama' => $request->nama,
            'isAccepted' => $request->isAccepted,
        ]);

        return ApiResponseClass::sendResponse(new BeritaResource($berita), 'Data berita berhasil diperbarui!', 200);
    }

    public function getAccepted($id)
    {   
        $berita = Berita::find($id);
        if (!$berita){
            return ApiResponseClass::sendError('Data berita tidak ditemukan!', 404);
        }

        $berita->isAccepted = 1;
        $berita->save();

        return ApiResponseClass::sendResponse(new BeritaResource($berita), 'Data berita berhasil diperbarui!', 200);
    }

    public function destroy(string $id)
    {
        $berita = Berita::find($id);
        if (!$berita) {
            return ApiResponseClass::sendError('Data berita tidak ditemukan!', 400);
        }

        foreach ($berita->foto as $file) {
            Storage::delete('public/berita/' . $file);
        }

        $berita->delete();

        return ApiResponseClass::sendResponse(null, 'Data berita berhasil dihapus!', 200);
    }
}

<?php

namespace App\Http\Controllers\api;

use App\Classes\ApiResponseClass;
use App\Http\Controllers\Controller;
use App\Http\Resources\BeritaCollection;
use App\Http\Resources\BeritaResource;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\isNull;

class BeritaController extends Controller
{
    public function getAll(Request $request) 
    {
        $perPage = intval($request->query('size'));
        $beritas = Berita::paginate($perPage);
        $resources = (new BeritaCollection($beritas))->response()->getData();

        return ApiResponseClass::sendResponse($resources, '', 200);
    }

    public function getById(string $id) 
    {
        $berita = Berita::where('id', $id)->first();
        
        if (isNull($berita)) {
            return ApiResponseClass::sendError('Data berita tidak ditemukan!', 400);
        }

        $resource = new BeritaResource($berita);
        return ApiResponseClass::sendResponse($resource, '', 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'judul' => 'required',
            'teks' => 'required',
        ]);

        if ($validator->fails()) {
            return ApiResponseClass::sendError($validator->errors(), 422);
        }

        $image = $request->file('foto');
        $image->storeAs('public/berita', $image->hashName());

        $berita = Berita::create([
            'foto' => $image->hashName(),
            'judul' => $request->judul,
            'teks' => $request->teks,
        ]);
        $resource = new BeritaResource($berita);

        return ApiResponseClass::sendResponse($resource, 'Data berita berhasil ditambahkan!', 201);
    }

    public function destroy(string $id)
    {
        $isDeleted = Berita::destroy(intval($id));
        
        if (!$isDeleted) {
            return ApiResponseClass::sendError('Data berita gagal dihapus!', 400);
        }

        return ApiResponseClass::sendResponse(null, 'Data berita berhasil dihapus!', 200);
    }
}

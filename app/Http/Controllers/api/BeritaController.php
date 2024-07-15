<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BeritaResource;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BeritaController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'foto'   => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'judul'  => 'required',
            'teks'   => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $image = $request->file('foto');
        $image->storeAs('public/berita', $image->hashName());

        $berita = Berita::create([
            'foto'     => $image->hashName(),
            'judul'     => $request->judul,
            'teks'   => $request->teks,
        ]);

        return new BeritaResource(true, 'Data Berita Berhasil Ditambahkan!', $berita);
    }
}

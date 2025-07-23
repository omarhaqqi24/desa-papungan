<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Umkm;
use Illuminate\Http\Request;

class PetaUmkmController extends Controller
{
    public function index() {
        // Ambil data UMKM dari database, beserta foto jika ada relasi
        $dataUmkm = Umkm::with('foto_umkm')->get();

        return view('peta-umkm', ['data' => $dataUmkm]);
    }
}

<?php

use App\Http\Controllers\admin\ProfilDesaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataDesaController;
use App\Http\Controllers\PerangkatDesaController;
use App\Http\Controllers\PengumumanController;
use App\Models\PerangkatDesa;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/profilDesa', [DataDesaController::class, "index"]);

Route::get('/pemerintahan',[PerangkatDesaController::class,"getData"]); 

Route::get('/pariwisataDesa', function () {
    return view('pariwisataDesa');
});

Route::get('/umkm', function () {
    return view('umkm');
});

Route::get('/test',[PengumumanController::class,"index"]);

Route::get('/peta-umkm', function() {
    return view('peta-umkm');
});

Route::get('/peta-wilayah', function() {
    return view('peta-wilayah');
});

Route::get('/informasi', function() {
    return view('informasi');
});

Route::get('/informasi', function() {
    return view('informasi');
});

Route::get('/admin/profil-desa', [ProfilDesaController::class, 'index'])->middleware('checkToken');

Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/login/index', [AuthController::class, 'index'])->name('auth.index');

Route::get('/adminProfilDesa',[ProfilDesaController::class,"index"]);
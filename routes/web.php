<?php

use App\Http\Controllers\admin\ProfilDesaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataDesaController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\PerangkatDesaController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\PetaUmkmController;
use App\Models\PerangkatDesa;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingPageController::class,'index']);

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
})->name('peta-wilayah');

Route::get('/admin/profil-desa', [ProfilDesaController::class, 'index'])
    ->middleware('checkToken')
    ->name('data-desa.index');

Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/login/index', [AuthController::class, 'index'])->name('auth.index');

Route::get('peta-umkm',[PetaUmkmController::class, 'index']);
Route::put('/admin/profil-desa', [ProfilDesaController::class, 'updateProfilDesa'])->name('profil-desa.update');
Route::get('/admin/pemerintahan', function () {
    return view('adminPemerintahan');
})->middleware('checkToken')->name('pemerintahan-desa.index');
Route::get('/admin/informasi', function () {
    return view('adminInformasi');
})->middleware('checkToken')->name('informasi-desa.index');
Route::get('/admin/umkm', function () {
    return view('adminUmkm');
})->middleware('checkToken')->name('umkm-desa.index');
Route::get('/admin/pariwisata-desa', function () {
    return view('adminPariwisata');
})->middleware('checkToken')->name('pariwisata-desa.index');


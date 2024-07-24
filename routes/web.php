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
// Route::get('/adminProfilDesa',[ProfilDesaController::class,"index"])->name('data-desa.index');
Route::put('/admin/profil-desa', [ProfilDesaController::class, 'update'])->name('data-desa.update');

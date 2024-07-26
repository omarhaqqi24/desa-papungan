<?php

use App\Http\Controllers\admin\InformasiDesaController;
use App\Http\Controllers\admin\PariwisataDesaController;
use App\Http\Controllers\admin\PemerintahanDesaController;
use App\Http\Controllers\admin\ProfilDesaController;
use App\Http\Controllers\admin\UmkmDesaController;
use App\Http\Controllers\api\BeritaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaPageController;
use App\Http\Controllers\DataDesaController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\PerangkatDesaController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\PengumumanPageController;
use App\Http\Controllers\PetaUmkmController;
use App\Models\PerangkatDesa;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingPageController::class,'index'])->name('home');

Route::get('/profilDesa', [DataDesaController::class, "index"]);

Route::get('/pemerintahan',[PerangkatDesaController::class,"getData"]);

Route::get('/pengumuman/{id}', [PengumumanPageController::class,'index']);
Route::get('/berita/{id}',[BeritaPageController::class,"index"]);

Route::get('/pariwisataDesa', function () {
    return view('pariwisataDesa');
});

Route::get('/umkm', function () {
    return view('umkm');
});

Route::get('/informasi',[PengumumanController::class,"index"]);
Route::post('/informasi',[PengumumanController::class,"store"])->name('informasi.store');

Route::get('/peta-umkm', function() {
    return view('peta-umkm');
})->name('peta.umkm');

Route::get('/peta-wilayah', function () {
    return view('peta-wilayah');
})->name('peta-wilayah');

Route::get('/admin/profil-desa', [ProfilDesaController::class, 'index'])
    ->middleware('checkToken')
    ->name('data-desa.index');


//public
Route::get('/', [LandingPageController::class, 'index'])->name('landingPage.index');
Route::get('/profilDesa', [DataDesaController::class, "index"])->name('profilDesa.index');
Route::get('/pemerintahan', [PerangkatDesaController::class, "getData"])->name('pemerintahan.index');
Route::get('/informasi', [PengumumanController::class, "index"])->name('informasi.index');
Route::get('/umkm', function () {
    return view('umkm');
})->name('umkm.index');
Route::get('/pariwisataDesa', function () {
    return view('pariwisataDesa');
})->name('pariwisata.index');



Route::get('peta-umkm', [PetaUmkmController::class, 'index']);

//admin
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/login', [AuthController::class, 'index'])->name('auth.index');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('checkToken')->name('auth.logout');


Route::put('/admin/profil-desa', [ProfilDesaController::class, 'updateProfilDesa'])->middleware('checkToken')->name('profil-desa.update');
Route::get('/admin/pemerintahan', [PemerintahanDesaController::class, 'index'])->middleware('checkToken')->name('pemerintahan-desa.index');
Route::post('/admin/perangkat-desa/create', [PemerintahanDesaController::class, 'tambahPerangkatDesa'])->middleware('checkToken')->name('perangkat-desa.create');
Route::post('/admin/lembaga-desa/create', [PemerintahanDesaController::class, 'tambahLembagaDesa'])->middleware('checkToken')->name('lembaga-desa.create');
Route::put('/admin/lembaga-desa/update', [PemerintahanDesaController::class, 'updateLembagaDesa'])->middleware('checkToken')->name('lembaga-desa.update');
Route::put('/admin/struktur-desa/update', [PemerintahanDesaController::class, 'updateStrukturDesa'])->middleware('checkToken')->name('struktur-desa.update');
Route::put('/admin/perangkat-desa/update', [PemerintahanDesaController::class, 'updatePerangkatDesa'])->middleware('checkToken')->name('perangkat-desa.update');
Route::get('/admin/informasi', [InformasiDesaController::class, 'index'])->middleware('checkToken')->name('informasi-desa.index');
Route::get('/admin/umkm/', [UmkmDesaController::class, 'index'])->middleware('checkToken')->name('umkm-desa.index');
Route::get('/admin/pariwisata-desa', [PariwisataDesaController::class, 'index'])->middleware('checkToken')->name('pariwisata-desa.index');
Route::put('/admin/visi', [ProfilDesaController::class, 'updateVisiDesa'])
    ->middleware('checkToken')
    ->name('visi.update');
Route::put('/admin/misi', [ProfilDesaController::class, 'updateMisiDesa'])
    ->middleware('checkToken')
    ->name('misi.update');
Route::delete('/admin/misi/{id}', [ProfilDesaController::class, 'deleteMisiDesa'])->middleware('checkToken')->name('misi.destroy');
Route::put('/admin/sejarah-desa', [ProfilDesaController::class, 'updateSejarahDesa'])
    ->middleware('checkToken')
    ->name('sejarah.update');
Route::post('/admin/misi', [ProfilDesaController::class, 'tambahMisiDesa'])
    ->middleware('checkToken')
    ->name('misi.create');

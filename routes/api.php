<?php

use App\Classes\ApiResponseClass;
use App\Http\Controllers\api\AspirasiController;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\BeritaController;
use App\Http\Controllers\api\DataDesaController;
use App\Http\Controllers\api\FotoUmkmController;
use App\Http\Controllers\api\LembagaController;
use App\Http\Controllers\api\PariwisataController;
use App\Http\Controllers\api\PengumumanController;
use App\Http\Controllers\api\PerangkatDesaController;
use App\Http\Controllers\api\UmkmController;
use App\Http\Controllers\api\JabatanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/berita', [BeritaController::class, 'getAll']);
Route::get('/berita/{id}', [BeritaController::class, 'getById']);
Route::post('/berita', [BeritaController::class, 'store']);
Route::put('/berita/{id}', [BeritaController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/berita/{id}', [BeritaController::class, 'destroy'])->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

//fallback route for unauthorized user
Route::get('/unauthorize', function () {
    return ApiResponseClass::sendError('Unauthorized', 403);
})->name('login');

Route::get('/perangkat-desa', [PerangkatDesaController::class, 'getAll']);
Route::post('/perangkat-desa', [PerangkatDesaController::class, 'store'])->middleware('auth:sanctum');
Route::put('/perangkat-desa/{id}', [PerangkatDesaController::class, 'destroy'])->middleware('auth:sanctum');
Route::delete('/perangkat-desa/{id}', [PerangkatDesaController::class, 'destroy'])->middleware('auth:sanctum');

Route::get('/pengumuman', [PengumumanController::class, 'getAll']);
Route::post('/pengumuman', [PengumumanController::class, 'store']);
Route::put('/pengumuman/{id}', [PengumumanController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/pengumuman/{id}', [PengumumanController::class, 'destroy'])->middleware('auth:sanctum');

Route::get('/aspirasi', [AspirasiController::class, 'getAll'])->middleware('auth:sanctum');
Route::post('/aspirasi', [AspirasiController::class, 'store']);

Route::get('/data-desa/{id}', [DataDesaController::class, 'getById']);
Route::put('/data-desa/{id}', [DataDesaController::class, 'update'])->middleware('auth:sanctum');

Route::get('/lembaga', [LembagaController::class, 'getAll']);
Route::post('/lembaga', [LembagaController::class, 'store'])->middleware('auth:sanctum');
Route::put('/lembaga/{id}', [LembagaController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/lembaga/{id}', [LembagaController::class, 'destroy'])->middleware('auth:sanctum');

Route::get('/umkm', [UmkmController::class, 'getAll']);
Route::get('/umkm/{id}', [UmkmController::class, 'getById']);
Route::post('/umkm', [UmkmController::class, 'store'])->middleware('auth:sanctum');
Route::put('/umkm/{id}', [UmkmController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/umkm/{id}', [UmkmController::class, 'destroy'])->middleware('auth:sanctum');

Route::post('/umkm/{umkm_id}/foto', [FotoUmkmController::class, 'store'])->middleware('auth:sanctum');
Route::delete('/umkm/{umkm_id}/foto', [FotoUmkmController::class, 'destroy'])->middleware('auth:sanctum');

Route::get('/pariwisata', [PariwisataController::class, 'getAll']);
Route::post('/pariwisata', [PariwisataController::class, 'store'])->middleware('auth:sanctum');
Route::put('/pariwisata/{id}', [PariwisataController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/pariwisata/{id}', [PariwisataController::class, 'destroy'])->middleware('auth:sanctum');

Route::get('/jabatan', [JabatanController::class, 'getAll'])->middleware(['auth:sanctum']);

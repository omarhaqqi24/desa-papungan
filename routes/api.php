<?php

use App\Classes\ApiResponseClass;
use App\Http\Controllers\api\AspirasiController;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\BeritaController;
use App\Http\Controllers\api\PengumumanController;
use App\Http\Controllers\api\PerangkatDesaController;
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
Route::delete('/perangkat-desa/{id}', [PerangkatDesaController::class, 'destroy'])->middleware('auth:sanctum');

Route::get('/pengumuman', [PengumumanController::class, 'getAll']);
Route::post('/pengumuman', [PengumumanController::class, 'store']);
Route::put('/pengumuman/{id}', [PengumumanController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/pengumuman/{id}', [PengumumanController::class, 'destroy'])->middleware('auth:sanctum');

Route::get('/aspirasi', [AspirasiController::class, 'getAll'])->middleware('auth:sanctum');
Route::post('/aspirasi', [AspirasiController::class, 'store'])->middleware('auth:sanctum');

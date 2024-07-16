<?php

use App\Http\Controllers\api\BeritaController;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/berita', [BeritaController::class, 'getAll']);
Route::get('/berita/{id}', [BeritaController::class, 'getById']);
Route::post('/berita', [BeritaController::class, 'store']);
Route::put('/berita/{id}', [BeritaController::class, 'update']);
Route::delete('/berita/{id}', [BeritaController::class, 'destroy']);

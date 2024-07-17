<?php

use App\Classes\ApiResponseClass;
use App\Http\Controllers\api\AuthController;
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
Route::put('/berita/{id}', [BeritaController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/berita/{id}', [BeritaController::class, 'destroy'])->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

//fallback route for unauthorized user
Route::get('/unauthorize', function () {
    return ApiResponseClass::sendError('Unauthorized', 403);
})->name('login');

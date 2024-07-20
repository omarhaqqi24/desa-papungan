<?php

use App\Http\Controllers\DataDesaController;
use App\Http\Controllers\DataDesaController as ControllersDataDesaController;
use App\Http\Controllers\PengumumanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/profilDesa', [DataDesaController::class, "index"]);

Route::get('/pemerintahan', function () {
    return view('pemerintahan');
});

Route::get('/pariwisataDesa', function () {
    return view('pariwisataDesa');
});

Route::get('/umkm', function () {
    return view('umkm');
});

Route::get('/test',[PengumumanController::class,"index"]);
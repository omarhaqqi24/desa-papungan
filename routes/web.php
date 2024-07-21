<?php

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


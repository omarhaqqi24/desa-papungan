<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/profilDesa', function () {
    return view('profilDesa');
});

Route::get('/pemerintahan', function () {
    return view('pemerintahan');
});

Route::get('/pariwisataDesa', function () {
    return view('pariwisataDesa');
});

Route::get('/umkm', function () {
    return view('umkm');
});

Route::get('/test', function () {
    return view('test');
});

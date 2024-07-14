<?php

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/berita', function (){
    return response()->json(Berita::all());
});
Route::get('/berita/{id}', function ($id) {
    return response()->json(Berita::find($id));
});

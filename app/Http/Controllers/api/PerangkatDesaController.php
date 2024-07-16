<?php

namespace App\Http\Controllers\api;

use App\Classes\ApiResponseClass;
use App\Http\Controllers\Controller;
use App\Http\Resources\PerangkatDesaCollection;
use App\Http\Resources\PerangkatDesaResource;
use App\Models\PerangkatDesa;
use Illuminate\Http\Request;

class PerangkatDesaController extends Controller
{
    public function get()
    {
        $perangkats = PerangkatDesa::all();
        $resource = new PerangkatDesaCollection($perangkats);
        return ApiResponseClass::sendResponse($resource, 'Data perangkat desa berhasil diambil!', 200); 
    }
}

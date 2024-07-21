<?php

namespace App\Http\Controllers\api;

use App\Classes\ApiResponseClass;
use App\Http\Controllers\Controller;
use App\Http\Resources\JabatanCollection;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function getAll()
    {
        $jabatans = Jabatan::orderBy('order', 'ASC')->distinct()->get();
        $resource = new JabatanCollection($jabatans);
        return ApiResponseClass::sendResponse($resource, 'Data jabatan berhasil diambil!', 200);
    }
}

<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Http\Resources\JabatanCollection;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function getAll()
    {
        $jabatans = Jabatan::orderBy('order', 'ASC')->get();
        $resource = new JabatanCollection($jabatans);
        return ApiResponseClass::sendResponse($resource, 'Data jabatan berhasil diambil!', 200);
    }
}

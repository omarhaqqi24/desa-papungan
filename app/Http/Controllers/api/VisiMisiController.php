<?php

namespace App\Http\Controllers\api;

use App\Classes\ApiResponseClass;
use App\Http\Controllers\Controller;
use App\Http\Resources\VisiMisiCollection;
use App\Http\Resources\VisiMisiResource;
use App\Models\VisiMisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VisiMisiController extends Controller
{
    public function getAll(){
        $v_misis = DB::table('visi_misis')->orderByRaw("FIELD(kategori, \"visi\", \"misi\")")->get();
        $resource = new VisiMisiCollection($v_misis);
        return ApiResponseClass::sendResponse($resource, 'Data visi misi berhasil diambil!', 200);
    }

    public function update(Request $request)
    {
        VisiMisi::truncate();
        
        VisiMisi::create([
            'kategori' => 'visi',
            'isi_poin' => $request->visi
        ]);

        foreach ($request->misi as $misi){
            VisiMisi::create([
                'kategori' => 'misi',
                'isi_poin' => $misi
            ]);
        }

        $resource = new VisiMisiCollection(VisiMisi::all());
        return ApiResponseClass::sendResponse($resource, 'Data visi misi berhasil diperbarui!', 200);
    }
}

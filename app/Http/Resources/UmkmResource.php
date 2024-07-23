<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UmkmResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nama' => $this->nama,
            'jenis' => $this->jenis_umkm,
            'deskripsi' => $this->deskripsi,
            'alamat' => $this->alamat,
            'kontak' => $this->kontak,
            'jam_buka' => $this->jam_buka,
            'lat' => $this->lat,
            'long' => $this->long,
            'no_nib' => $this->no_nib,
            'no_pirt' => $this->no_pirt,
            'no_halal' => $this->no_halal,
            'no_bpom' => $this->no_bpom,
            'foto' => $this->foto_umkm,
            'createdAt' => Carbon::parse($this->created_at)->format('d-M-Y'),
            'updatedAt' => Carbon::parse($this->updated_at)->format('d-M-Y')
        ];
    }
}

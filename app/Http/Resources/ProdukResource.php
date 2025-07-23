<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class ProdukResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'nama_produk'  => $this->nama_produk,
            'harga'        => $this->harga,
            'no_pirt'      => $this->no_pirt,
            'no_halal'     => $this->no_halal,
            'jenis_produk' => $this->jenis_produk,
            'image'        => collect($this->foto)->map(fn($file) => url('storage/produk/' . $file)),
            'umkm_id'      => $this->umkm_id,
            'isAccepted' => intval($this->isAccepted),
            'createdAt' => Carbon::parse($this->created_at)->format('d-M-Y'),
            'updatedAt' => Carbon::parse($this->updated_at)->format('d-M-Y')
        ];
    }
}

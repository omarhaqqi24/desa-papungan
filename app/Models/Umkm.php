<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'jenis', 'deskripsi', 'alamat',
        'kontak', 'jam_buka', 'lat', 'long',
        'no_nib', 'no_pirt', 'no_halal', 'no_bpom'
    ];

    public function fotoUmkm()
    {
        return $this->hasMany(FotoUmkm::class);
    }
}

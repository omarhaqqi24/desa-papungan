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

    public function foto_umkm()
    {
        return $this->hasMany(FotoUmkm::class);
    }

    public function jenis_umkm()
    {
        return $this->hasMany(JenisUmkm::class);
    }
}

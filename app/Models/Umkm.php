<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Umkm extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'deskripsi', 'alamat',
        'kontak', 'jam_buka', 'lat', 'long',
        'url_map', 'no_nib', 'no_bpom'
    ];

    public function foto_umkm(): HasMany
    {
        return $this->hasMany(FotoUmkm::class);
    }
}

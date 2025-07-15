<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = ['nama_produk', 'harga', 'no_pirt', 'umkm_id'];

    public function umkm()
    {
        return $this->belongsTo(Umkm::class, 'umkm_id');
    }
}

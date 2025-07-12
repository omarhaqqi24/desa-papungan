<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Belanja extends Model
{
    protected $table = 'belanja';

    protected $fillable = [
        'nama_produk',
        'jumlah',
        'harga_satuan',
        'total_harga',
        'tanggal_belanja',
        'keterangan'
    ];

    public $timestamps = false;
}
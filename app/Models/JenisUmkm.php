<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisUmkm extends Model
{
    use HasFactory;

    protected $fillable = ['jenis', 'umkm_id'];
}

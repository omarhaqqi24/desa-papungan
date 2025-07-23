<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $fillable = ['judul', 'isi', 'nama', 'foto', 'isAccepted'];

    // accessor agar 'foto' dipisahkan menjadi array
    public function getFotoAttribute($value)
    {
        return array_map('trim', explode(',', $value));
    }
}
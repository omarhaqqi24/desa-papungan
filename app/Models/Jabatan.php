<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Jabatan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'order'
    ];

    public function perangkatDesa(): HasMany
    {
        return $this->hasMany(PerangkatDesa::class);
    }
}

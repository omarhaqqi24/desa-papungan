<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FotoUmkm extends Model
{
    use HasFactory;

    protected $fillable = ['foto', 'umkm_id'];

    public function umkm(): BelongsTo
    {
        return $this->belongsTo(Umkm::class);
    }
}

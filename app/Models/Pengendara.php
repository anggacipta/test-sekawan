<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pengendara extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'ttl', 'alamat'];

    public function persetujuan(): HasMany
    {
        return $this->hasMany(Persetujuan::class, 'id_pengendara', 'id');
    }
}

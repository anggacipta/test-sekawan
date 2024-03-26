<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Persetujuan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_users',
        'id_kendaraan',
        'id_pengendara',
        'persetujuan_admin',
        'persetujuan_atasan',
        'admin_menanggapi',
        'atasan_menanggapi',
    ];

    public function pengendara(): BelongsTo
    {
        return $this->belongsTo(Pengendara::class,'id_pengendara', 'id');
    }

    public function pengguna(): BelongsTo
    {
        return $this->belongsTo(User::class,'id_users', 'id');
    }

    public function kendaraans(): BelongsTo
    {
        return $this->belongsTo(Kendaraan::class,'id_kendaraan', 'id');
    }
}

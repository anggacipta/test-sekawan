<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Kendaraan extends Model
{
    use HasFactory;

    protected $fillable = [
      'nama_kendaraan', 'konsumsi_bbm', 'plat_nomor', 'jadwal_service', 'riwayat_pemakaian'
    ];


}

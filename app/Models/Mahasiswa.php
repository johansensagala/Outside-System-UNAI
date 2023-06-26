<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim',
        'password',
        'nama',
        'date',
        'status',
        'nomor_pribadi',
        'nomor_ortu_wali'
    ];

    public function absensi ()
    {
        return $this->hasMany(Mahasiswa::class);
    }

    public function pengajuan_luar_asrama ()
    {
        return $this->hasMany(PengajuanLuarAsrama::class);
    }

    public function pengajuan_penjamin ()
    {
        return $this->hasMany(PengajuanPenjamin::class);
    }
}

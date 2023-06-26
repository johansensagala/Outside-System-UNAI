<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjamin extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'password',
        'nama',
        'nomor_telp'
    ];

    public function pengajuan_penjamin ()
    {
        return $this->hasMany(PengajuanPenjamin::class);
    }

    public function pengajuan_luar_asrama ()
    {
        return $this->hasMany(PengajuanLuarAsrama::class);
    }

    public function pengajuan_data_tempat_tinggal ()
    {
        return $this->hasMany(PengajuanDataTempatTinggal::class);
    }
}

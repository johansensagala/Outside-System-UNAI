<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanDataTempatTinggal extends Model
{
    use HasFactory;

    protected $fillable = [
        'alamat',
        'gps',
        'foto_tempat_tinggal',
        'kapasitas',
        'persetujuan',
        'id_penjamin',
        'id_pr3'
    ];

    public function penjamin ()
    {
        return $this->belongsTo(Penjamin::class);
    }

    public function pegawai ()
    {
        return $this->belongsTo(BiroKemahasiswaan::class);
    }
}

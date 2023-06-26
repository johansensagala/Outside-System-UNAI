<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanLuarAsrama extends Model
{
    use HasFactory;

    protected $fillable = [
        'surat',
        'alamat',
        'gps',
        'foto_tempat_tinggal',
        'persetujuan',
        'comment',
        'id_penjamin',
        'id_pr3',
        'id_mahasiswa'
    ];

    public function penjamin ()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function pegawai ()
    {
        return $this->belongsTo(BiroKemahasiswaan::class);
    }

    public function mahasiswa ()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
}

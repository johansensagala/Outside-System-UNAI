<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanDataPenjamin extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public $timestamps = true;

    public function penjamin ()
    {
        return $this->belongsTo(Penjamin::class, 'id_penjamin');
    }

    public function pegawai ()
    {
        return $this->belongsTo(BiroKemahasiswaan::class);
    }
}

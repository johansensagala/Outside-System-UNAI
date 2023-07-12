<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanPenjamin extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function mahasiswa ()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function penjamin ()
    {
        return $this->belongsTo(Penjamin::class);
    }
}
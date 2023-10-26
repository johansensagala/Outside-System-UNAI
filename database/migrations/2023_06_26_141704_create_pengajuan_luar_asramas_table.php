<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengajuan_luar_asramas', function (Blueprint $table) {
            $table->id();
            $table->string('surat_outside');
            $table->string('status_penjamin');
            $table->string('status_tinggal');
            $table->string('comment')->nullable();
            $table->string('tahun_ajaran');
            $table->unsignedBigInteger('id_penjamin');
            $table->unsignedBigInteger('id_biro_kemahasiswaan');
            $table->unsignedBigInteger('id_mahasiswa');
            $table->timestamps();

            $table->foreign('id_penjamin')->references('id')->on('penjamins');
            $table->foreign('id_biro_kemahasiswaan')->references('id')->on('biro_kemahasiswaans');
            $table->foreign('id_mahasiswa')->references('id')->on('mahasiswas');
        });

        $bulanSaatIni = date('n');
        $tahunSaatIni = date('Y');

        if ($bulanSaatIni >= 1 && $bulanSaatIni <= 6) {
            $tahunAjaran = ($tahunSaatIni - 1) . '/' . $tahunSaatIni;
        } else {
            $tahunAjaran = $tahunSaatIni . '/' . ($tahunSaatIni + 1);
        }

        DB::table('pengajuan_luar_asramas')->update(['tahun_ajaran' => $tahunAjaran]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_luar_asramas');
    }
};

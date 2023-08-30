<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
            $table->string('alamat');
            $table->decimal('latitude', 9, 6);
            $table->decimal('longitude', 9, 6);
            $table->string('foto_tempat_tinggal');
            $table->string('persetujuan');
            $table->string('comment');
            $table->unsignedBigInteger('id_penjamin');
            $table->unsignedBigInteger('id_pr3');
            $table->unsignedBigInteger('id_mahasiswa');
            $table->timestamps();

            $table->foreign('id_penjamin')->references('id')->on('penjamins');
            $table->foreign('id_pr3')->references('id')->on('biro_kemahasiswaans');
            $table->foreign('id_mahasiswa')->references('id')->on('mahasiswas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_luar_asramas');
    }
};

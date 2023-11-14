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
            $table->string('jurusan');
            $table->string('status_tinggal');
            $table->string('surat_outside');
            $table->string('tahun_ajaran');
            $table->string('comment')->nullable();
            $table->string('status_penjamin')->default('pending');
            $table->text('alamat')->nullable();
            $table->decimal('latitude', 9, 67)->nullable();
            $table->decimal('longitude', 9, 6)->nullable();
            $table->string('foto_tempat_tinggal')->nullable();
            $table->string('surat_kebenaran')->nullable();
            $table->string('status')->default('pending');
            $table->unsignedBigInteger('id_penjamin')->nullable();
            $table->unsignedBigInteger('id_biro_kemahasiswaan')->nullable();
            $table->unsignedBigInteger('id_mahasiswa');
            $table->timestamps();

            $table->foreign('id_penjamin')->references('id')->on('penjamins');
            $table->foreign('id_biro_kemahasiswaan')->references('id')->on('biro_kemahasiswaans');
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

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
        Schema::create('absensis', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->decimal('latitude', 9, 6);
            $table->decimal('longitude', 9, 6);
            $table->string('kehadiran');
            $table->unsignedBigInteger('id_mahasiswa');
            // $table->unsignedBigInteger('id_pegawai');
            $table->timestamps();

            $table->foreign('id_mahasiswa')->references('id')->on('mahasiswas');
            $table->foreign('id_pegawai')->references('id')->on('biro_kemahasiswaans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensis');
    }
};

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
        Schema::create('pengajuan_penjamins', function (Blueprint $table) {
            $table->id();
            $table->string('persetujuan');
            $table->string('comment')->nullable();
            $table->unsignedBigInteger('id_penjamin');
            $table->unsignedBigInteger('id_mahasiswa');
            $table->timestamps();

            $table->foreign('id_penjamin')->references('id')->on('penjamins');
            $table->foreign('id_mahasiswa')->references('id')->on('mahasiswas');
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_penjamins');
    }
};

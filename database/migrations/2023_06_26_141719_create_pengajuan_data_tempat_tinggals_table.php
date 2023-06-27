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
        Schema::create('pengajuan_data_tempat_tinggals', function (Blueprint $table) {
            $table->id();
            $table->text('alamat');
            $table->string('gps');
            $table->string('foto_tempat_tinggal');
            $table->integer('kapasitas');
            $table->string('persetujuan');
            $table->unsignedBigInteger('id_penjamin');
            $table->unsignedBigInteger('id_pr3');
            $table->timestamps();

            $table->foreign('id_penjamin')->references('id')->on('penjamins');
            $table->foreign('id_pr3')->references('id')->on('biro_kemahasiswaans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_data_tempat_tinggals');
    }
};

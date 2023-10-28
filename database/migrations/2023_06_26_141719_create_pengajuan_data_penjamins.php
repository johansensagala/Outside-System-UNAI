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
        Schema::create('pengajuan_data_penjamins', function (Blueprint $table) {
            $table->id();
            $table->text('alamat');
            $table->decimal('latitude', 9, 6);
            $table->decimal('longitude', 9, 6);
            $table->string('foto_tempat_tinggal');
            $table->integer('kapasitas');
            $table->string('status')->default('pending');
            $table->string('comment')->nullable();
            $table->string('kode_penjamin')->nullable();
            $table->unsignedBigInteger('id_penjamin')->nullable();
            $table->unsignedBigInteger('id_biro_kemahasiswaan')->nullable();
            $table->timestamps();

            $table->foreign('id_penjamin')->references('id')->on('penjamins');
            $table->foreign('id_biro_kemahasiswaan')->references('id')->on('biro_kemahasiswaans');
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

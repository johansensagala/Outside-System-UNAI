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
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->string('nim')->unique();
            $table->string('password');
            $table->string('nama');
            $table->string('angkatan');
            $table->string('nomor_pribadi');
            $table->string('nomor_ortu_wali');
            $table->boolean('role')->default(false);
            $table->unsignedSmallInteger('percobaan')->default(5);
            $table->time('waktu_gagal')->default('1970-01-01 00:00:00');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};

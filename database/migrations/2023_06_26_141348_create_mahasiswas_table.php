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
<<<<<<< HEAD
            $table->string('angkatan');
=======
            $table->string('semester');
            $table->boolean('status')->default(false);
>>>>>>> 4df304e48ee2f6c576286dacd6b4b9ac6a7c219a
            $table->string('nomor_pribadi');
            $table->string('nomor_ortu_wali');
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

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
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->String('nama');
            $table->String('nik')->nullable();
            $table->unsignedBigInteger('id_jenisPegawai')->nullable();
            $table->unsignedBigInteger('id_statusPegawai')->nullable();
            $table->String('unit')->nullable();
            $table->String('subUnit')->nullable();
            $table->unsignedBigInteger('id_pendidikan')->nullable();
            $table->String('tanggalLahir')->nullable();
            $table->String('tempatLahir')->nullable();
            $table->unsignedBigInteger('id_jenisKelamin')->nullable();
            $table->unsignedBigInteger('id_agama')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai');
    }
};

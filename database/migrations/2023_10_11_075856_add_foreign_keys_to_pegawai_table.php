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
        Schema::table('pegawai', function (Blueprint $table) {

            $table->foreign('id_agama')->references('id')->on('agama');

            $table->foreign('id_jenisKelamin')->references('id')->on('jeniskelamin');

            $table->foreign('id_statusPegawai')->references('id')->on('statuspegawai');

            $table->foreign('id_jenisPegawai')->references('id')->on('jenispegawai');

            $table->foreign('id_pendidikan')->references('id')->on('pendidikan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pegawai', function (Blueprint $table) {
            //
        });
    }
};

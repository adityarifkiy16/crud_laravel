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
        // foreign peserta
        Schema::table('peserta', function (Blueprint $table) {
            $table->foreign('id_user')->references('id_user')->on('users');
        });


        // foreign jawaban
        Schema::table('jawaban', function (Blueprint $table) {
            $table->foreign('id_peserta')->references('id_peserta')->on('peserta');
            $table->foreign('id_jenis')->references('id_jenis')->on('jenis');
        });


        // foreign soal
        Schema::table('soal', function (Blueprint $table) {
            $table->foreign('id_jenis')->references('id_jenis')->on('jenis');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

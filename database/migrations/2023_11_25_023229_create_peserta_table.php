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
        Schema::create('peserta', function (Blueprint $table) {
            $table->id('id_peserta');
            $table->unsignedBigInteger('id_user');
            $table->string('nama');
            $table->enum('gender', ['laki-laki', 'perempuan'])->default('laki-laki');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('asal_kota');
            $table->string('nomer_telp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peserta');
    }
};

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
        Schema::create('jawaban', function (Blueprint $table) {
            $table->id('id_jawaban');
            $table->unsignedBigInteger('id_peserta');
            $table->unsignedBigInteger('id_jenis');
            $table->string('name');
            $table->text('jawaban');
            $table->integer('nilai');
            $table->string('keterangan', 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jawaban');
    }
};

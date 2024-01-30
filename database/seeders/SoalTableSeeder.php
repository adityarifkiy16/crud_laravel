<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SoalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('soal')->insert([
            'id_jenis' => 1,
            'soal' => "sapi:mengembek, ayam?",
            'pilihan1' => "mengembek",
            'pilihan2' => "melahirkan",
            'pilihan3' => "rumput",
            'pilihan4' => "bertelur",
            'jawaban' => "melahirkan"
        ]);
    }
}

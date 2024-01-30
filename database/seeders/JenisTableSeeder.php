<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JenisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jenis')->insert([
            'jenis' => 'TKD',
            'ket' => 'Lengkapilah soal berikut',
            'tipe' => 'Ganda',
            'waktu' => '00:01:00',
        ]);
    }
}

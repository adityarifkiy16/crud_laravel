<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PesertaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('peserta')->insert([
            'id_user' => 2,
            'email' => 'peserta@mail.com',
            'nama' => 'peserta1',
            'gender' => 'laki-laki',
            'tempat_lahir' => 'semarang',
            'tgl_lahir' => now(),
            'asal_kota' => 'semarang',
            'nomer_telp' => '0816969696',
        ]);
    }
}

<?php

namespace App\Models;

use App\Models\Soal;
use App\Models\Peserta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jawaban extends Model
{
    use HasFactory;

    protected $table = 'jawaban';
    protected $primaryKey = 'id_jawaban';

    protected $fillable = [
        'id_peserta',
        'id_soal',
        'name',
        'jawaban',
        'nilai',
        'keterangan',
    ];

    protected $casts = [
        'jawaban' => 'json', // Cast the 'jawaban' attribute to JSON
    ];

    public function peserta()
    {
        return $this->hasOne(Peserta::class, 'id_peserta', 'id_peserta');
    }

    public function soal()
    {
        return $this->hasOne(Soal::class, 'id_soal', 'id_soal');
    }
}

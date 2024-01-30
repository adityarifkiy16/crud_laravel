<?php

namespace App\Models;

use App\Models\Jenis;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Soal extends Model
{
    use HasFactory;

    public $table = 'soal';
    protected $primaryKey = 'id_soal';

    protected $fillable = [
        'soal',
        'id_jenis',
        'pilihan1',
        'pilihan2',
        'pilihan3',
        'pilihan4',
        'jawaban',
    ];

    public function jenis()
    {
        return $this->hasOne(Jenis::class, 'id_jenis', 'id_jenis');
    }
}

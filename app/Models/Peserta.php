<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peserta extends Model
{
    use HasFactory;

    protected $table = 'peserta';
    protected $primaryKey = 'id_peserta';

    protected $fillable = [
        'id_user',
        'nama',
        'gender',
        'tempat_lahir',
        'tgl_lahir',
        'asal_kota',
        'nomer_telp'
    ];

    public function User()
    {
        return $this->hasOne(User::class, 'id_user', 'id_user');
    }
}

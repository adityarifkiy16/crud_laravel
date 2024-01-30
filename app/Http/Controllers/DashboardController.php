<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Models\User;
use App\Models\Jenis;
use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 'peserta') {
            $pendaftaran = Peserta::whereRaw('id_user=?', [Auth::user()->id_user])->first();
            return view('dashboard.pesertaindex', ['pendaftaran' => $pendaftaran]);
        } else {
            $pesertaCount = Peserta::count();
            $soalCount = Soal::count();
            $jenisCount = Jenis::count();
            return view('dashboard', [
                'pesertaCount' => $pesertaCount,
                'soalCount' => $soalCount,
                'jenisCount' => $jenisCount,
            ]);
        }
    }
}

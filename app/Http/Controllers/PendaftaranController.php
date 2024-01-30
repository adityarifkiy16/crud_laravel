<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $q = $request->get('q');
        $pendaftarans = Peserta::where(function ($query) use ($q) {
            $query->when($q, function ($query, $q) {
                return $query
                    ->where('nama', 'like', '%' . $q . '%')
                    ->orWhere('tempat_lahir', 'like', '%' . $q . '%')
                    ->orWhere('nomer_telp', 'like', '%' . $q . '%')
                    ->orWhere('asal_kota', 'like', '%' . $q . '%')
                    ->orWhere('gender', 'like', '%' . $q . '%');
            });
        })->paginate(1)->withQueryString();

        return view('pendaftaran.index', [
            'q' => $q,
            'pendaftaran' => $pendaftarans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pendaftaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama' => ['required', 'string', 'max:255'],
                'gender' => ['required', 'string', 'max:255', 'in:laki-laki,perempuan'],
                'tempat_lahir' => ['required', 'string', 'max:255'],
                'tgl_lahir' => ['required', 'date'],
                'asal_kota' => ['required', 'string', 'max:255'],
                'nomer_telp' => ['required', 'string', 'max:255'],
            ]);

            $dataPeserta = $request->all();
            $dataPeserta['id_user'] = Auth::user()->id_user;
            Peserta::create($dataPeserta);
            return redirect('/login');
        } catch (\Exception $e) {
            $errorMessage = "An error occurred: {$e->getMessage()}";
            return back()->withErrors(['error' => $errorMessage]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $peserta = Peserta::where('id_peserta', $id);
        $peserta->delete();
        return redirect('/pendaftaran');
    }
}

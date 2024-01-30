<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Models\Jenis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class SoalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $soal = Soal::paginate(3);
        return View::make('soal.index')
            ->with([
                'soal' => $soal,
            ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenis = Jenis::pluck('jenis', 'id_jenis');
        return View::make('soal.create')
            ->with([
                'jenis' => $jenis,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // verifikasi input
            $request->validate([
                'soal' => ['required', 'string'],
                'jenis' => ['required', 'exists:jenis,id_jenis'],
                'pilihan1' => ['required', 'string'],
                'pilihan2' => ['required', 'string'],
                'pilihan3' => ['required', 'string'],
                'pilihan4' => ['required', 'string'],
                'jawaban' => ['required', 'string'],
            ]);

            $data = $request->all();
            $data['id_jenis'] = $data['jenis'];
            Soal::create($data);
            return redirect('/soal');
        } catch (\Exception $th) {
            dd($th->getMessage());
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Soal $soal)
    {
        $selectedJenis = $soal->jenis->id_jenis ?? null;

        return View::make('soal.edit')
            ->with([
                'soal' => $soal,
                'jenisOptions' => Jenis::pluck('jenis', 'id_jenis'),
                'selectedJenis' => $selectedJenis,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Soal $soal)
    {
        // verifikasi input
        $request->validate([
            'soal' => ['required', 'string'],
            'jenis' => ['required', 'string'],
            'pilihan1' => ['required', 'string'],
            'pilihan2' => ['required', 'string'],
            'pilihan3' => ['required', 'string'],
            'pilihan4' => ['required', 'string'],
            'jawaban' => ['required', 'string'],
        ]);

        // Extract jenis from the request and find its corresponding ID
        $idjenis = Jenis::findOrFail($request->input('jenis'))->id_jenis;

        // Update the Soal
        $datasoal = $request->only(['soal', 'pilihan1', 'pilihan2', 'pilihan3', 'pilihan4', 'jawaban']);
        $datasoal['id_jenis'] = $idjenis;

        $soal->update($datasoal);

        return redirect('/soal');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $soal = Soal::where('id_soal', $id);
        $soal->delete();
        return redirect('/soal');
    }
}

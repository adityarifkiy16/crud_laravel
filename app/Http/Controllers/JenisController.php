<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Models\Jenis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenis = Jenis::paginate(3);

        return View::make('jenis.index')
            ->with([
                'jenis' => $jenis,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return View::make('jenis.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis' => ['required', 'string'],
            'waktu' => ['required', 'regex:/^([01]?[0-9]|2[0-3]):[0-5][0-9]:[0-5][0-9]$/']
        ]);

        $data = $request->all();
        Jenis::create($data);
        return redirect('/soal');
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
    public function edit(Jenis $jenis)
    {
        return View::make('jenis.edit')->with(['jenis' => $jenis]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jenis $jenis)
    {
        $request->validate([
            'jenis' => ['required', 'string'],
            'waktu' => ['required', 'regex:/^([01]?[0-9]|2[0-3]):[0-5][0-9]:[0-5][0-9]$/']
        ]);

        $data = $request->all();
        $jenis->update($data);
        return redirect('/jenis');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $soal = Soal::has('jenis')->where('id_jenis', '=', $id)->first();

        if ($soal) {
            return response()->json(['error' => 'Jenis yang dipilih adalah foreign key'], 422);
        }
        $jenis = Jenis::where('id_jenis', $id);
        $jenis->delete();
    }
}

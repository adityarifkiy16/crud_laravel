@extends('layouts.app')

@section('main')
<x-header>
    <x-slot:title>Edit Soal </x-slot:title>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Soal &raquo; {{ $soal->id_soal }} &raquo; Edit
    </h2>
</x-header>

<form method="post" action="{{ route('soal.update', ['soal' => $soal->id_soal] ) }}" class="flex flex-col gap-6">
    @csrf
    @method('PUT')

    <!-- SOAL -->
    <div class="flex flex-col">
        <div class="flex flex-col items-start">
            <label for="soal" class="text-base">Soal</label>
            <textarea name="soal" type="text" class="input-field w-full" rows="5">{{$soal->soal}}</textarea>
        </div>
    </div>

    <!-- JENIS SOAL and PILIHAN JAWABAN -->
    <div class="flex flex-col md:flex-row md:justify-between gap-2">

        <!-- JENIS SOAL  -->
        <div class="flex flex-col max-w-md w-full">
            <label for="jenis">Jenis</label>
            <select name="jenis" class="input-field p-3 my-2 md:my-5 ring-2 ring-black w-full">
                @foreach($jenisOptions as $id => $jenis)
                <option value="{{ $id }}" {{ (old('jenis') ?? $selectedJenis) == $id ? 'selected' : '' }}>
                    {{ $jenis }}
                </option>
                @endforeach
            </select>

            <!-- JAWABAN -->
            <div class="flex flex-col w-full">
                <label for="jawaban" class="text-base">Jawaban</label>
                <input name="jawaban" type="text" value="{{ $soal->jawaban }}" class="input-field p-3 my-2 md:my-5 ring-2 ring-black"></input>
                <button type="submit" class="w-full rounded-lg px-5 py-2 bg-gray-600 text-white">Update</button>
            </div>
        </div>

        <!-- PILIHAN JAWABAN -->
        <div class="flex flex-col gap-5 w-1/2">
            <label for="pilihan" class="text-base">Pilihan</label>
            <!-- Pilihan Jawaban 1 -->
            <div class="flex items-center mb-2">
                <label for="pilihan1" class="text-base">A</label>
                <input type="text" name="pilihan1" id="pilihan1" class="input-field ml-2 w-full" value="{{ $soal->pilihan1 }}" required></input>
            </div>
            <!-- Pilihan Jawaban 2 -->
            <div class="flex items-center mb-2">
                <label for="pilihan2" class="text-base">B</label>
                <input type="text" name="pilihan2" id="pilihan2" class="input-field ml-2 w-full" value="{{ $soal->pilihan2 }}" required></input>
            </div>
            <!-- Pilihan Jawaban 3 -->
            <div class="flex items-center mb-2">
                <label for="pilihan3" class="text-base">C</label>
                <input type="text" name="pilihan3" id="pilihan3" class="input-field ml-2 w-full" value="{{ $soal->pilihan3 }}" required></input>
            </div>
            <!-- Pilihan Jawaban 4 -->
            <div class="flex items-center mb-2">
                <label for="pilihan3" class="text-base">D</label>
                <input type="text" name="pilihan4" id="pilihan4" class="input-field ml-2 w-full" value="{{ $soal->pilihan4 }}" required></input>
            </div>
        </div>
    </div>


</form>
@endsection
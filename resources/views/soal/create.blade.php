@extends('layouts.app')

@section('main')

<x-header>
    <x-slot:title>✏ Tambah Soal</x-slot:title>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia sunt, assumenda dignissimos doloremque
    reiciendis autem iusto saepe ut minima nesciunt?
</x-header>

<form method="post" action="{{ route('soal.store') }}" class="flex flex-col gap-6">
    @csrf

    <!-- SOAL -->
    <div class="flex flex-col">
        <div class="flex flex-col items-start">
            <label for="soal">Soal</label>
            <textarea name="soal" type="text" value="" class="input-field w-full" rows="5"></textarea>
        </div>
    </div>

    <!-- JENIS SOAL and PILIHAN JAWABAN -->
    <div class="flex flex-col md:flex-row md:justify-between gap-6">

        <!-- JENIS SOAL  -->
        <div class="flex flex-col max-w-md w-full">
            <label for="jenis">Jenis</label>
            <select name="jenis" class="input-field p-3 my-2 md:my-5 ring-2 ring-black w-full">
                @foreach($jenis as $k => $v )
                <option value="{{ $k }}">{{ $v }}</option>
                @endforeach
            </select>
            <!-- JAWABAN -->
            <div class="flex flex-col w-full">
                <label for="jawaban">Jawaban</label>
                <input name="jawaban" type="text" class="input-field p-3 my-2 md:my-5 ring-2 ring-black" />
            </div>
        </div>



        <!-- PILIHAN JAWABAN -->
        <div class="flex flex-col w-full">
            <label for="pilihan">Pilihan Jawaban</label>
            @foreach(range(1, 4) as $index)
            <div class="flex items-center mb-2">
                <label for="pilihan{{ $index }}">{{ strtoupper(chr(64 + $index)) }}</label>
                <input type="text" name="pilihan{{ $index }}" id="pilihan{{ $index }}" class="input-field ml-2 w-full" required />
            </div>
            @endforeach
        </div>
    </div>
    <button type="submit" class="w-full rounded-lg px-5 py-2 bg-gray-600 text-white">Create</button>
</form>
@endsection
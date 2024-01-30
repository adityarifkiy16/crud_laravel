@extends('layouts.app')

@section('main')
<x-header>
    <x-slot:title>Edit Jenis </x-slot:title>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Soal &raquo; {{ $jenis->id_jenis }} &raquo; Edit
    </h2>
</x-header>

<form action="{{ route('jenis.update', $jenis) }}" method="post" class="bg-white p-6 rounded-md shadow-md">
    @csrf
    @method('PUT')

    <!-- Jenis Soal -->
    <div class="mb-4">
        <label for="jenis" class="block text-gray-700 text-sm font-bold mb-2">Jenis Soal:</label>
        <input type="text" name="jenis" id="jenis" class="form-input w-full @error('jenis') border-red-500 @enderror" value="{{ old('jenis') ?? $jenis->jenis }}" required>
        @error('jenis')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
    </div>

    <!-- Waktu -->
    <div class="mb-4">
        <label for="waktu" class="block text-gray-700 text-sm font-bold mb-2">Waktu:</label>
        <input type="text" id="waktu" name="waktu" pattern="^([01]?[0-9]|2[0-3]):[0-5][0-9]:[0-5][0-9]$" placeholder="00:00:00" class="form-input w-full" value="{{ old('jenis') ?? $jenis->waktu }}" required>
    </div>

    <div class="flex items-center justify-end mt-6">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
            Simpan
        </button>
    </div>
</form>
@endsection
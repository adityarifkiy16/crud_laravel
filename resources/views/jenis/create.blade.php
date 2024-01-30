@extends('layouts.app')

@section('main')
<x-header>
    <x-slot:title>✏ Tambah Jenis</x-slot:title>
    Halaman ini digunakan untuk membuat soal.
</x-header>

<div class="mx-auto">
    <form action="{{ route('jenis.store') }}" method="POST" class="bg-white p-6 rounded-md shadow-md">
        @csrf

        <!-- Jenis Soal -->
        <div class="mb-4">
            <label for="jenis" class="block text-gray-700 text-sm font-bold mb-2">Jenis Soal:</label>
            <input type="text" name="jenis" id="jenis" class="form-input w-full @error('jenis') border-red-500 @enderror" value="{{ old('jenis') }}" required>
            @error('jenis')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <!-- Waktu -->
        <div class="mb-4">
            <label for="waktu" class="block text-gray-700 text-sm font-bold mb-2">Waktu:</label>
            <input type="text" id="waktu" name="waktu" pattern="^([01]?[0-9]|2[0-3]):[0-5][0-9]:[0-5][0-9]$" placeholder="00:00:00" class="form-input w-full" required>
        </div>

        <div class="flex items-center justify-end mt-6">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
@extends('layouts.app')

@section('main')
<section class="mt-8 flex flex-col justify-center items-center md:flex-row gap-8">
    <x-card class="w-64 bg-[#0658cb] hover:bg-blue-900">
        <x-slot:title>{{ number_format($pesertaCount) }}</x-slot:title>
        <p class="text-base font-bold">Banyak Peserta Ujian</p>
    </x-card>
    <x-card class="w-64 bg-[#0658cb] hover:bg-blue-900">
        <x-slot:title>{{ number_format($soalCount) }}</x-slot:title>
        <p class="text-base font-bold">Banyak Soal Ujian</p>
    </x-card>
    <x-card class="w-64 bg-[#0658cb] hover:bg-blue-900">
        <x-slot:title>{{ number_format($jenisCount) }}</x-slot:title>
        <p class="text-base font-bold">Banyak Jenis Soal</p>
    </x-card>
</section>
@endsection
@extends('layouts.app')

@section('main')
<x-header>
    <x-slot:title>{{__('PESERTA')}}</x-slot:title>
</x-header>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 md:mb-10">
        @if($pendaftaran)
        <div class="mb-10 bg-white py-10 px-4">
            <div class="mb-6">
                <div class="uppercase text-gray-700 text-xs font-bold mb-2">Nama Lengkap</div>
                <div class="bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight">
                    {{ $pendaftaran->nama }}
                </div>
            </div>
            <div class="mb-6">
                <div class="uppercase text-gray-700 text-xs font-bold mb-2">Gender</div>
                <div class="bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight">
                    {{ $pendaftaran->gender }}
                </div>
            </div>
            <div class="mb-6">
                <div class="uppercase text-gray-700 text-xs font-bold mb-2">Kota</div>
                <div class="bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight">
                    {{ $pendaftaran->asal_kota }}
                </div>
            </div>
            <div class="mb-6">
                <div class="uppercase text-gray-700 text-xs font-bold mb-2">Tempat Lahir</div>
                <div class="bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight">
                    {{ $pendaftaran->tempat_lahir }}
                </div>
            </div>
            <div class="mb-6">
                <div class="uppercase text-gray-700 text-xs font-bold mb-2">Tanggal Lahir</div>
                <div class="bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight">
                    {{ Carbon\Carbon::parse($pendaftaran->tgl_lahir)->format('Y-m-d') }}
                </div>
            </div>
            <div class="mb-6">
                <div class="text-gray-700 text-xs mb-2">Tanggal pendaftaran {{ Carbon\Carbon::parse($pendaftaran->created_at)->format('Y-m-d') }}
                </div>
            </div>
        </div>
        @else
        <div class="mb-10 mx-auto rounded-md bg-white py-10 px-4 flex flex-col max-w-2xl justify-center items-center gap-5">
            <span class="font-sans text-base font-semibold">klik disini untuk mendaftar</span>
            <a href="{{ url('/pendaftaran/create') }}" class="bg-green-500 w-fit hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                Lakukan pendaftaran
            </a>
        </div>
        @endif
    </div>
</div>
@endsection
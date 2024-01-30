@extends('layouts.app')

@section('main')
<x-header>
    <x-slot:title>✏ Data Peserta</x-slot:title>
    Halaman ini digunakan untuk melihat data peserta.
</x-header>


<div class="overflow-x-auto">
    <form class="mb-10 flex flex-row items-center justify-end" method="get">
        <input name="q" value="{{ $q }}" class="input-field ring-2 mx-2 ring-black max-w-sm" id="grid-last-name" type="text" placeholder="Search" />
        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 mx-2 rounded">
            Cari
        </button>
    </form>
    <table class="w-full text-sm text-left text-gray-500 rounded-lg bg-blue-500">
        <thead class="text-xs text-center text-white uppercase ">
            <tr>
                <th scope="col" class="py-3 px-6">
                    ID Peserta
                </th>

                <th scope="col" class="py-3 px-6">
                    Nama Pendaftaran
                </th>

                <th scope="col" class="py-3 px-6">
                    Gender
                </th>
                <th scope="col" class="py-3 px-6">
                    Tempat Lahir
                </th>

                <th scope="col" class="py-3 px-6">
                    Tanggal Lahir
                </th>

                <th scope="col" class="py-3 px-6">
                    Asal Kota
                </th>

                <th scope="col" class="py-3 px-6">
                    Nomer Telpon
                </th>
            </tr>
        </thead>
        <tbody class="text-center bg-white">
            @forelse($pendaftaran as $item)
            <tr class="border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="py-4 px-6">{{ $item->id_peserta }}</td>
                <td class="py-4 px-6">{{ $item->nama }}</td>
                <td class="py-4 px-6">{{ $item->gender }}</td>
                <td class="py-4 px-6">{{ $item->tempat_lahir }}</td>
                <td class="py-4 px-6">{{ $item->tgl_lahir }}</td>
                <td class="py-4 px-6">{{ $item->asal_kota }}</td>
                <td class="py-4 px-6">{{ $item->nomer_telp }}</td>
                <td class="py-4 px-6 flex flex-col justify-center md:flex-row gap-3">
                    <form action="{{ url('/pendaftaran/destroy/'.$item->id_peserta) }}" class='delete-form' method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded flex flex-row delete-btn">
                            <img src="{{ asset('img/icon/delete.svg') }}" alt="icon-add" class="w-5 h-5 mr-2">
                            Delete
                        </button>
                    </form>

            <tr>
                @empty
                <td colspan="7" class="border text-center p-5">
                    Data Tidak Ditemukan
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="text-center mt-5">
        {{ $pendaftaran->links('vendor.pagination.tailwind') }}
    </div>
</div>
@endsection
@push('custom-script')
<script>
    $(document).ready(function() {
        $('.delete-btn').click(function() {
            const form = $(this).closest('.delete-form');
            Swal.fire({
                icon: 'warning',
                text: 'Do you want to delete this?',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                confirmButtonColor: '#e3342f',
            }).then((result) => {
                if (result.isConfirmed) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                    });

                    Toast.fire({
                        icon: 'success',
                        title: 'Deleted!',
                        text: 'Your record has been deleted.',
                    });

                    setTimeout(function() {
                        form.submit();
                    }, 3000);
                }
            });
        });
    });
</script>
@endpush
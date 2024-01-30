@extends('layouts.app')

@section('main')
<x-header>
    <x-slot:title>✏ Soal</x-slot:title>
    Halaman ini digunakan untuk mengelola soal termasuk pembuatan, pengeditan, dan penghapusan.
    <span class="text-red-500"> Note : Sebelum membuat soal pastikan anda membuat jenis dari soal tersebut. </span>
</x-header>

<div class="mb-14">
    <a href="{{ route('soal.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded flex items-center w-fit">
        <img src="{{ asset('img/icon/add.svg') }}" alt="icon-add" class="w-5 h-5 mr-2">
        Create Soal
    </a>
</div>

<div class="overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500 rounded-lg bg-blue-500">
        <thead class="text-xs text-center text-white uppercase ">
            <tr>
                <th scope="col" class="py-3 px-6">
                    JENIS Soal
                </th>
                <th scope="col" class="py-3 px-6">
                    ID SOAL
                </th>
                <th scope="col" class="py-3 px-6">
                    soal
                </th>
                <th scope="col" class="py-3 px-6">
                    Action
                </th>
            </tr>
        </thead>
        <tbody class="text-center bg-white">
            @forelse($soal as $item)
            <tr class="border-b hover:bg-gray-50 ">
                <td class="py-4 px-6">{{ $item->jenis->jenis }}</td>
                <td class="py-4 px-6">{{ $item->id_soal }}</td>
                <td class="py-4 px-6">{{ $item->soal }}</td>
                <td class="py-4 px-6 flex flex-col justify-center md:flex-row gap-3">
                    <a href="{{ route('soal.edit', $item) }}" class="flex bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mx-2 rounded">
                        <img src="{{ asset('img/icon/edit.svg') }}" alt="icon-add" class="w-5 h-5 mr-2">
                        Edit
                    </a>
                    <form action="{{ route('soal.destroy', $item) }}" class='delete-form' method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded flex flex-row delete-btn">
                            <img src="{{ asset('img/icon/delete.svg') }}" alt="icon-add" class="w-5 h-5 mr-2">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            <tr>
                @empty
                <td colspan="6" class="border text-center p-5">
                    Data Tidak Ditemukan
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="text-center mt-5">
        {{ $soal->links('vendor.pagination.tailwind') }}
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
                    }, 4000);
                }
            });
        });
    });
</script>
@endpush
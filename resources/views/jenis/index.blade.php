@extends('layouts.app')

@section('main')
<x-header>
    <x-slot:title>✏ Jenis Soal</x-slot:title>
    <span class="text-red-500"> Note : "Pastikan tidak ada pertanyaan yang terkait dengan jenis soal yang akan dihapus." </span>
</x-header>

<div class="mb-14">
    <a href="{{ route('jenis.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
        + Create Jenis
    </a>
</div>
<div class="overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500 rounded-lg bg-blue-500">
        <thead class="text-xs text-center text-white uppercase ">
            <tr>
                <th scope="col" class="py-3 px-6">
                    ID
                </th>
                <th scope="col" class="py-3 px-6">
                    Jenis Soal
                </th>
                <th scope="col" class="py-3 px-6">
                    Waktu
                </th>
                <th scope="col" class="py-3 px-6">
                    Action
                </th>
            </tr>
        </thead>
        <tbody class="text-center bg-white">
            @forelse($jenis as $item)
            <tr class="border-b hover:bg-gray-50 ">
                <td class=" py-4 px-6">{{ $item->id_jenis }}</td>
                <td class="py-4 px-6">{{ $item->jenis }}</td>
                <td class="py-4 px-6">{{ $item->waktu }}</td>
                <td class="py-4 px-6 flex flex-col md:flex-row gap-2 justify-center">
                    <a href="{{ route('jenis.edit', $item) }}" class="flex bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mx-2 rounded">
                        <img src="{{ asset('img/icon/edit.svg') }}" alt="icon-add" class="w-5 h-5 mr-2">
                        Edit
                    </a>
                    <form action="{{ route('jenis.destroy', $item) }}" class='delete-form' method="POST" data-jenis-id="{{ $item->id_jenis }}">
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
        {{ $jenis->links('vendor.pagination.tailwind') }}
    </div>
</div>
@endsection
@push('custom-script')
<script>
    $(document).ready(function() {
        $('.delete-btn').click(function() {
            const form = $(this).closest('.delete-form');
            const jenisId = form.data('jenis-id');

            Swal.fire({
                icon: 'warning',
                text: 'Do you want to delete this?',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                confirmButtonColor: '#e3342f',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: form.attr('action'),
                        type: 'post',
                        data: {
                            _token: form.find('input[name="_token"]').val(),
                            _method: form.find('input[name="_method"]').val(),
                            jenis: jenisId,
                        },
                        success: function(response) {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
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
                                window.location.reload();
                            }, 3000);
                        },
                        error: function(xhr) {
                            let errorMessage = xhr.responseJSON.error || 'An error occurred';

                            if (errorMessage.includes('foreign key')) {
                                errorMessage = 'Cannot delete. Related records exist.';
                            }
                            Swal.fire({
                                icon: 'error',
                                title: 'Deletion Error',
                                text: errorMessage,
                            });
                        }
                    });
                }

            });
        });
    })
</script>
@endpush
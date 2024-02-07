@extends('layouts.app')

@section('main')
<x-header>
    <x-slot:title>✏ User</x-slot:title>
</x-header>

<div class="mb-14">
    <a href="{{ route('user.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded flex items-center w-fit">
        <img src="{{ asset('img/icon/add.svg') }}" alt="icon-add" class="w-5 h-5 mr-2">
        Add User
    </a>
</div>

<div class="overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500 rounded-lg bg-blue-500">
        <thead class="text-xs text-center text-white uppercase">
            <tr>
                <th scope="col" class="py-3 px-6">ID</th>
                <th scope="col" class="py-3 px-6">Email</th>
                <th scope="col" class="py-3 px-6">Role</th>
                <th scope="col" class="py-3 px-6">Action</th>
            </tr>
        </thead>
        <tbody class="text-center bg-white">
            @forelse($user as $item)
            <tr class="border-b hover:bg-gray-50">
                <td class="py-4 px-6">{{ $item->id_user }}</td>
                <td class="py-4 px-6">{{ $item->email }}</td>
                <td class="py-4 px-6">{{ $item->role }}</td>
                <td class="py-4 px-6 flex flex-col justify-center md:flex-row gap-3">
                    <a href="{{ route('user.edit', $item) }}" class="flex bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mx-2 rounded">
                        <img src="{{ asset('img/icon/edit.svg') }}" alt="icon-add" class="w-5 h-5 mr-2">
                        Edit
                    </a>
                    <form action="{{ route('user.destroy', $item) }}" class='delete-form' method="POST" data-jenis-id="{{ $item->id_user }}" >
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded flex flex-row delete-btn" data-user-id="{{ $item->id_user }}">
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
        {{ $user->links('vendor.pagination.tailwind') }}
    </div>
</div>
@endsection

@push('custom-script')
<script>
    $(document).ready(function() {
        $('.delete-btn').click(function(e) {
            e.preventDefault();
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
                            let errorMessage = xhr.responseJSON.error;

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

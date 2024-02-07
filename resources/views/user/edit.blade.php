@extends('layouts.app')

@section('main')
<x-header>
    <x-slot:title> 📑Edit {{ $user->email }} </x-slot:title>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        User &raquo; {{ $user->id_user }} &raquo; Edit
    </h2>
</x-header>

<form action="{{ route('user.update', ['user' => $user->id_user]) }}" method="post" class="bg-white p-6 mt-10 rounded-md shadow-md edit-form">
    @csrf
    @method('PUT')
    <div class="mb-4">
        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
        <input type="text" name="email" id="email" class="form-input w-full" disabled value="{{ old('email') ?? $user->email }}" required>
    </div>

    <div class="mb-4">
        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
        <input type="password" name="password" id="password" class="form-input w-full" value="{{ old('password')}}" required>
    </div>

    <div class="mb-4">
        <label for="role" class="block text-gray-700 text-sm font-bold mb-2">Role</label>
        <select name="role" class="input-field p-3 my-5 ring-2 ring-black">
            <option value="{{ $user->role }}">{{ $user->role}}</option>
            <option value="peserta">peserta</option>
            <option value="admin">admin</option>
        </select>
    </div>

    <div class="flex items-center justify-end mt-6">
        <button type="submit" class="bg-blue-500 save-btn hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
            Simpan
        </button>
    </div>
</form>
@endsection
@push('custom-script')
<script>
    $(document).ready(function() {
        $('.save-btn').click(function(e) {
            e.preventDefault();
            const form = $(this).closest('.edit-form');
            Swal.fire({
                icon: 'warning',
                text: 'Do you want to save this?',
                showCancelButton: true,
                confirmButtonText: 'Save',
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
                        title: 'Saved!',
                        text: 'Your record has been saved.',
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
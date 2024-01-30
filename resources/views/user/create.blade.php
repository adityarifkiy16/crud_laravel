@extends('layouts.guest')
@section('main')

<span class="w-40 h-40 bg-[#F11A7B] blur-xl rounded-full absolute bottom-0 start-80 translate-y-1/2 animate-blob"></span>
<span class="w-40 h-40 bg-[#FFE5AD] blur-xl rounded-full absolute top-0 end-96 -translate-y-1/2 animate-blobb"></span>
<div class="relative flex flex-wrap items-center justify-center md:flex-row ">
    <div class="rounded-lg p-4 overflow-y-auto shadow-[0.625rem_0.625rem_0.875rem_0_rgb(0,0,0,0.1),-0.5rem_-0.5rem_1.125rem_0_rgb(0,0,0,0.1)] backdrop-blur-3xl lg:w-1/3 lg:p-8">
        <form method="POST" action="{{ route('user.store') }}" class="w-full">
            @csrf
            <span class="mb-12 text-xl md:text-2xl">
                <h1 class="mb-4 text-base md:text-xl font-bold">Sisfopsikotes.</h1>
                <h2 class="font-normal">Holla Admin,</h2>
                <p class="font-thin">Please create account</p>
            </span>
            <div class="flex flex-col mt-5">
                <div class="mb-4">
                    <label for="email">Email</label>
                    <input name="email" type="text" value="{{ old('email') }}" class="input-field p-3 my-5 ring-2 ring-black" />
                </div>

                <div class="mb-4">
                    <label for="password">Password</label>
                    <input name="password" type="password" class="input-field p-3 my-5 ring-2 ring-black" />
                </div>

                <div class="mb-4">
                    <label for="role" class="block text-gray-700 text-sm font-bold mb-2">Role</label>
                    <select name="role" class="input-field p-3 my-5 ring-2 ring-black">
                        <option value="peserta">peserta</option>
                        <option value="admin">admin</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="button-submit bg-orange-700">Register</button>
        </form>
    </div>
</div>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    (function() {
        flatpickr('#tgl_lahir', {});
    })();
</script>


@endsection
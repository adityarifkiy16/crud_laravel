@extends('layouts.guest')
@section('main')

<span class="w-40 h-40 bg-[#f3ec9f] blur-xl rounded-full absolute bottom-0 start-60 translate-y-1/2 animate-blob"></span>
<span class="w-40 h-40 bg-[#FFE5AD] blur-xl rounded-full absolute top-0 end-64 -translate-y-1/2 animate-blobb"></span>
<div class="relative flex flex-wrap items-center justify-center md:flex-row">
    <div class="w-full relative rounded-lg p-4 shadow-[0.625rem_0.625rem_0.875rem_0_rgb(0,0,0,0.1),-0.5rem_-0.5rem_1.125rem_0_rgb(0,0,0,0.1)] backdrop-blur-3xl lg:w-1/3 lg:p-8">
        <div class="flex flex-row gap-2 absolute top-2 z-20 right-5">
            <span class="w-4 h-4 bg-red-600 rounded-full"></span>
            <span class="w-4 h-4 bg-orange-500 rounded-full"></span>
            <span class="w-4 h-4 bg-green-500 rounded-full"></span>
        </div>
        <form method="POST" action="{{ url('/login/store') }}" class="my-auto flex flex-col" id="form-regis">

            <span class="mb-12 text-xl md:text-2xl">
                <h1 class="mb-4 text-base md:text-xl font-bold">Sisfopsikotes.</h1>
                <h2 class="font-normal">Hello there,</h2>
                <p class="font-thin">Please create your account</p>
            </span>
            @csrf
            <div class="flex flex-col gap-4">
                <div class="relative w-full">
                    <input type="text" id="email" name="email" class="input-field-float focus:border-yellow-600 peer" placeholder="{{ old('email') }} " />
                    <label for="email" class="label-float -translate-y-4 peer-focus:-translate-y-4 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 top-2 peer-focus:scale-75 scale-75 peer-placeholder-shown:scale-100 peer-focus:text-orange-500">Email</label>
                </div>
                <div class="relative w-full">
                    <input name="password" id="password" type="password" class="input-field-float focus:border-yellow-600 peer" placeholder="{{ old('password') }}" />
                    <label for="password" class="label-float -translate-y-4 peer-focus:-translate-y-4 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 top-2 peer-focus:scale-75 scale-75 peer-placeholder-shown:scale-100 peer-focus:text-orange-500">Password</label>
                </div>
                <div class="flex flex-row mb-5 text-base hover:text-pink-600 hover:-translate-y-1 transition "><a href="{{ route('login') }}">Having account? login here</a></div>
            </div>
            <button type="submit" id="submit" class="button-submit bg-orange-700">Register</button>
        </form>
    </div>
</div>
@endsection
@push('custom-script')
<script>
    $(document).ready(function() {
        $('#submit').click(function(e) {
            e.preventDefault();

            const email = $('#email').val();
            const pass = $('#password').val();
            const form = $('#form-regis');

            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: {
                    _token: form.find('input[name="_token"]').val(),
                    email: email,
                    password: pass
                },
                success: function(response) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                    });

                    if (response.error) {
                        Toast.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: response.error,
                        });
                    } else {
                        Toast.fire({
                            icon: 'success',
                            title: 'Register!',
                            text: 'Your record has been registered.',
                        });

                        setTimeout(function() {
                            window.location.href= '/dashboard';
                        }, 3000);
                    }
                }
            });
        });
    });
</script>
@endpush
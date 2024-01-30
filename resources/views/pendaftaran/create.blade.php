@extends('layouts.guest')
@section('main')

<span class="w-40 h-40 bg-[#F11A7B] blur-xl rounded-full absolute bottom-0 start-80 translate-y-1/2 animate-blob"></span>
<span class="w-40 h-40 bg-[#FFE5AD] blur-xl rounded-full absolute top-0 end-96 -translate-y-1/2 animate-blobb"></span>
<div class="relative flex flex-wrap items-center justify-center md:flex-row">
    <div class="w-full rounded-lg p-4 overflow-y-auto shadow-[0.625rem_0.625rem_0.875rem_0_rgb(0,0,0,0.1),-0.5rem_-0.5rem_1.125rem_0_rgb(0,0,0,0.1)] backdrop-blur-3xl lg:w-1/3 lg:p-8">
        @error('error')
        <div class="my-5 text-pink-600 text-sm">{{ $message }}</div>
        @enderror
        <form method="POST" action="{{ url('/pendaftaran/store') }}" class="create-form">
            @if ($errors->any())
            <div class="mb-5" role="alert">
                <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                    There's something wrong!
                </div>

                <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                    <p>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    </p>
                </div>
            </div>
            @endif
            @csrf
            <div class="flex gap-3">
                <div class="flex flex-col">
                    <div>
                        <label for="name">Nama Lengkap:</label>
                        <input name="nama" type="text" value="{{ old('nama') }}" class="input-field p-3 my-5 ring-2 ring-black" />
                    </div>

                    <div>
                        <label for="gender">Jenis Kelamin:</label>
                        <select name="gender" class="input-field p-3 my-5 ring-2 ring-black">
                            <option value="laki-laki">laki-laki</option>
                            <option value="perempuan">perempuan</option>
                        </select>
                    </div>

                    <div>
                        <label for="tempat_lahir">Tempat Lahir:</label>
                        <input name="tempat_lahir" type="text" value="{{ old('tempat_lahir') }}" class="input-field p-3 my-5 ring-2 ring-black" />
                    </div>
                </div>

                <div class="flex flex-col">
                    <div>
                        <label for="asal_kota">Asal Kota</label>
                        <input name="asal_kota" type="text" value="{{ old('asal_kota') }}" class="input-field p-3 my-5 ring-2 ring-black" />
                    </div>

                    <div>
                        <label name="nomer_telp">Nomer Telepon</label>
                        <input name="nomer_telp" type="text" value="{{ old('nomer_telp') }}" class="input-field p-3 my-5 ring-2 ring-black" />
                    </div>

                    <div>
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input name="tgl_lahir" type="date" value="{{ old('tgl_lahir') }}" id="tgl_lahir" class="input-field p-3 my-5 ring-2 ring-black" placeholder="Select Date..." />
                    </div>
                </div>

            </div>
            <button type="button" class="button-submit save-btn bg-orange-700 mb-10">Register</button>
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
@push('custom-script')
<script>
    $(document).ready(function() {
        $('.save-btn').click(function() {
            const form = $(this).closest('.create-form');
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
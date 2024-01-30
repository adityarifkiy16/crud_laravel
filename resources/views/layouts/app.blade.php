<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sisfopsikotes</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>

<body class="overflow-auto">
    <section class="flex flex-col justify-center items-center">
        <div class="container my-auto relative">
            <!-- navbar -->
            <x-navbar />
            <div class="flex gap-5">
                @if(Auth::user()->role=='admin')
                <x-sidebar class="w-56">
                    <li>
                        <a href="{{ route('dashboard' )}}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-customBlue group dark:hover:bg-gray-700">
                            <img src="{{ asset('img/icon/dashboard.svg') }}" alt="icon-add" class="w-5 h-5">
                            <span class="flex-1 ml-3 whitespace-nowrap group-hover:text-white"> {{ __('Dashboard') }}</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{url('/soal')}}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-customBlue group dark:hover:bg-gray-700">
                            <img src="{{ asset('img/icon/question.svg') }}" alt="icon-add" class="w-5 h-5">
                            <span class="flex-1 ml-3 whitespace-nowrap group-hover:text-white">{{ __('Soal') }}</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{url('/jenis')}}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-customBlue group dark:hover:bg-gray-700">
                            <img src="{{ asset('img/icon/jenis.svg') }}" alt="icon-add" class="w-5 h-5">
                            <span class="flex-1 ml-3 whitespace-nowrap group-hover:text-white">{{ __('Jenis Soal') }}</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{url('/pendaftaran')}}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg group hover:bg-customBlue group dark:hover:bg-gray-700">
                            <img src="{{ asset('img/icon/user.svg') }}" alt="icon-add" class="w-5 h-5">
                            <span class="flex-1 ml-3 whitespace-nowrap group-hover:text-white">{{ __('Peserta') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/user')}}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg group hover:bg-customBlue group dark:hover:bg-gray-700">
                            <img src="{{ asset('img/icon/user.svg') }}" alt="icon-add" class="w-5 h-5">
                            <span class="flex-1 ml-3 whitespace-nowrap group-hover:text-white">{{ __('User') }}</span>
                        </a>
                    </li>
                </x-sidebar>
                @endif
                <main class="bg-gray-200 p-10 w-full overflow-hidden h-[100vh]">
                    @yield('main')
                </main>
            </div>
        </div>
    </section>
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('custom-script')
</body>

</html>
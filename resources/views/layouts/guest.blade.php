<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>sisfopsikotes</title>

    <!-- Scripts -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>

<body>
    <section class="flex flex-col justify-center items-center h-screen overflow-hidden">
        <div class="container my-auto relative">
            @yield('main')
        </div>
    </section>
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('custom-script')
</body>

</html>
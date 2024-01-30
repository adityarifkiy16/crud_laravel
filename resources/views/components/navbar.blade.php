@auth
<nav class="border-gray-500">
    <div class="max-w-screen flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="{{ url('/dashboard') }}" class="flex items-center pl-2.5">
            <img src="{{ asset('/img/logo.png') }}" class="mr-3 h-6 sm:h-7" alt="Logo" />
            <span class="self-center text-xl font-semibold whitespace-nowrap">Sisfopsikotes</span>
        </a>

        <!-- Awal Hamburger -->
        <button id="hamburger" name="hamburger" data-collapse-toggle="navbar" aria-controls="navbar-default" aria-expanded="false" type="button" class="block self-center md:hidden ">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <!-- akhir Hamburger -->


        <div class="hidden w-full md:block md:w-auto" id="navbar">
            <ul class="flex flex-col font-medium p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 md:p-0 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white ">
                <li>
                    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto ">{{ Auth::user()->email }} <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg></button>

                    <!-- Dropdown menu -->
                    <div id="dropdownNavbar" class="z-10 hidden font-semibold bg-white shadow w-48 rounded-md">
                        @csrf
                        <ul class="text-sm text-gray-700 " aria-labelledby="dropdownLargeButton">
                            <li>
                                <a href="{{ route('logout') }}" class="block px-6 py-2 hover:bg-red-600 hover:text-white rounded-md">{{ __('Log Out') }}</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- Soal menu -->
                <li>
                    <a href="{{url('/soal')}}" class="block md:hidden px-4 py-2 hover:bg-gray-100">
                        <span class="flex items-center">
                            <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z">
                                </path>
                                <path d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z">
                                </path>
                            </svg>
                            <span class="ml-3">Soal</span>
                        </span>
                    </a>
                </li>

                <!-- Jenis Soal menu -->
                <li>
                    <a href="{{url('/jenis')}}" class="block md:hidden px-4 py-2 hover:bg-gray-100">
                        <span class="flex items-center">
                            <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z">
                                </path>
                                <path d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z">
                                </path>
                            </svg>
                            <span class="ml-3">Jenis Soal</span>
                        </span>
                    </a>
                </li>
        </div>
</nav>
@endauth
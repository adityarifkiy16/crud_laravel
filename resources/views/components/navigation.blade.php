<div class="p-4">
    <div class="flex justify-between space-x-4">
        <div class="flex">
            <div class="shrink-0 flex items-center">
                <a href="{{ url('dashboard') }}">
                    <div class="w-12">
                        <img src="{{asset('img/logo.png')}}" alt="logo">
                    </div>
                </a>
                <span class="ml-5"> {{ __('Sisfopsikotes') }} </span>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    @if(Auth::user()->role == 'admin')
                    @csrf
                    <li class="inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition"><a href="{{url('/soal')}}" class="hover:text-gray-300">Soal</a></li>
                    <li class="inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition"><a href="#" class="hover:text-gray-300">About</a></li>
                    <li class="inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition"><a href="#" class="hover:text-gray-300">Services</a></li>
                    <li class="inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition"><a href="#" class="hover:text-gray-300">Contact</a></li>
                </div>
                @endif
            </div>
        </div>
        <form action="{{ url('/logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md">Logout</button>
        </form>
    </div>
</div>
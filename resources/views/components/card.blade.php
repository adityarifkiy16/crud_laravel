<a href="#" {{ $attributes->merge(['class' => 'card'])}}>
    <h5 class="mb-2 text-2xl font-bold tracking-tight text-white">{{ $title }}</h5>
    <span class="font-normal text-white dark:text-gray-400">{{ $slot }}</span>
</a>
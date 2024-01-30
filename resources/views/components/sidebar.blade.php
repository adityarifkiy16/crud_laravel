<aside aria-label="Sidebar" {{ $attributes->merge(['class' => ''])}}>
    <div class="sidebar">
        <ul class="space-y-2">
            @if(Auth::user()->role == 'admin')
            {{ $slot }}
            @endif
        </ul>
    </div>
</aside>
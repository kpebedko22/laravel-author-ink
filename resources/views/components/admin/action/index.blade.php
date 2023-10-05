<a {{ $attributes->merge(['class' => 'py-2 px-4 rounded-xl inline-flex items-center']) }}
   href="{{ $url }}"
>
    <span>{{ $slot }}</span>
</a>

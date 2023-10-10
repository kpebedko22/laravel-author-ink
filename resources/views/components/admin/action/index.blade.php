@props([
    'url' => '',
    'formMethod' => null,
    'label' => null,
    'color' => 'primary'
])

@php
    $classes = Arr::toCssClasses([
        'py-2 px-4 rounded-xl inline-flex items-center transition-all shadow-md',
        'bg-primary-800 hover:bg-primary-700 text-white' => $color === 'primary',
        'bg-danger-600 hover:bg-danger-500 text-white' => $color === 'danger',
        'bg-gray-600 text-gray-500' => $color === 'secondary',
        'bg-success-600 text-success-500' => $color === 'success',
        'bg-warning-600 text-warning-500' => $color === 'warning',
    ]);
@endphp

@unless($formMethod)
    <a href="{{ $url }}"
        {{ $attributes->merge(['class' => $classes]) }}
    >
        <span>{{ $label ?? $slot }}</span>
    </a>
@else
    <form action="{{ $url }}" method="POST">
        @method($formMethod)
        @csrf
        <button type="submit"
            {{ $attributes->merge(['class' => $classes]) }}
        >
            {{ $label ?? $slot }}
        </button>
    </form>
@endunless


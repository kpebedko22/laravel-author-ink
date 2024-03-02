@props([
    'value',
    'label',
])

<div {{ $attributes->class('flex items-center gap-2 mt-3') }}
        {{ $attributes->only(['wire:click']) }}
>
    <p class="block antialiased font-sans text-base leading-relaxed text-inherit !text-gray-900 font-bold"
    >{{ $value }}</p>
    <p class="block antialiased font-sans text-base leading-relaxed text-inherit !text-gray-500 font-normal"
    >{{ $label }}</p>
</div>

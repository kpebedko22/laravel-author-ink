@props([
    'heading',
    'actions',
])

<div class="flex justify-between flex-col md:flex-row mb-6 gap-2">
    <h1 class="text-3xl font-semibold text-black">
        {{ $heading }}
    </h1>

    @isset($actions)
        <div class="flex items-center gap-2">
            {{ $actions }}
        </div>
    @endisset
</div>

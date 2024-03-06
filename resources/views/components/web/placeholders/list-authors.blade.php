@props([
    'attributes' => null,
])

<div class="pt-4 grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 lg:gap-8"
     id="paginated-authors"
    {{ $attributes?->thatStartWith('wire:loading') }}
>
    @foreach(range(0, 14) as $i)
        <x-web.skeletons.author-card/>
    @endforeach
</div>


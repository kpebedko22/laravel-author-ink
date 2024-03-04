<?php
/**
 * @var App\Models\Author $author
 */
$avatarUrl = $author->getFirstMediaUrl('avatar');
?>

<div class="flex flex-col justify-between p-6 bg-white border border-gray-200 rounded-xl shadow">
    <a href="{{ route('web.authors.show', $author) }}" class="flex gap-4">
        @if($avatarUrl)
            <img src="{{ $avatarUrl }}" alt="{{ $author->name }}" class="w-12 h-12 rounded-full">
        @else
            <div class="w-12 h-12">
                {!! Avatar::setTheme('author-sm')->create($author->name)->toSvg() !!}
            </div>
        @endif

        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900"
        >{{ $author->name }}</h5>
    </a>

    <div class="flex justify-end">
        <div class="">
            <a href="{{ route('web.authors.show', $author) }}"
               class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg text-gray-900 hover:bg-gray-900/10 active:bg-gray-900/20 flex items-center gap-2"
            >{{ 'Перейти' }}
                <x-heroicon-o-arrow-right class="h-3.5 w-3.5 text-gray-900 stroke-2"/>
            </a>
        </div>
    </div>
</div>

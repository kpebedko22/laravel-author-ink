<?php
/**
 * @var App\Livewire\Authors\ViewAuthor $this
 * @var Illuminate\Support\Collection<App\Models\Book> $topBooks
 */

if ($this->author->cover_color) {
    $coverStyle = "background-color: {$this->author->cover_color};";
    $coverClass = '';
} else {
    $coverStyle = '';
    $coverClass = 'bg-gray-900';
}

$avatarUrl = $this->author->getFirstMediaUrl('avatar');
$coverUrl = $this->author->getFirstMediaUrl('coverImage');
?>
<div>
    <div class="rounded-2xl">
        <div
            class="{{ $coverClass }} max-h-48 md:max-h-64 lg:max-h-80 h-80 rounded-2xl overflow-hidden flex justify-center items-center"
            style="{{ $coverStyle }}"
        >
            @if($coverUrl)
                <img src="{{ $coverUrl }}"
                     alt="Cover Image"
                     class="object-cover min-h-full min-w-full shrink-0"
                >
            @endif
        </div>

        <div class="container mx-auto px-8 lg:px-48 flex">
            <div class="absolute -translate-y-28">
                @if($avatarUrl)
                    <img class="bg-amber-400 rounded-2xl w-40 h-40"
                         src="{{ $avatarUrl }}"
                         alt="{{ $this->author->name }}"
                    >
                @else
                    <div class="bg-amber-400 overflow-hidden rounded-2xl w-40 h-40">
                        {!! Avatar::setTheme('author-lg')->create($this->author->name)->toSvg() !!}
                    </div>
                @endif
            </div>

            <div class="mt-20">
                <div class="flex justify-between">
                    <h5 class="block antialiased tracking-normal font-sans font-semibold text-inherit text-3xl"
                    >{{ $this->author->name }}</h5>
                    <div>
                        @if($this->isFollowed())
                            <button type="button"
                                    class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg bg-gray-900 text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none"
                                    wire:click="unfollow"
                            >{{ 'Отписаться' }}</button>
                        @else
                            <button type="button"
                                    class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg bg-gray-900 text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none"
                                    wire:click="follow"
                            >{{ 'Подписаться' }}</button>
                        @endif
                    </div>
                </div>

                <div class="flex items-center gap-6">
                    <x-web.author-stat :label="__('web/authors.view.stat.books')"
                                       :value="$this->author->books_count"
                    />
                    <x-web.author-stat :label="__('web/authors.view.stat.followers')"
                                       :value="$this->author->followers_count"
                                       class="cursor-pointer"
                                       wire:click="$dispatch('openModal', { component: 'followers.list-followers-modal', arguments: { author: {{ $this->author->id }}, listFollowings: false } })"
                    />
                    <x-web.author-stat :label="__('web/authors.view.stat.followings')"
                                       :value="$this->author->followings_count"
                                       class="cursor-pointer"
                                       wire:click="$dispatch('openModal', { component: 'followers.list-followers-modal', arguments: { author: {{ $this->author->id }}, listFollowings: true  } })"
                    />
                </div>

                {{-- TODO: add author description --}}
                <p class="block antialiased font-sans text-xl font-normal leading-relaxed text-inherit !text-gray-500 mt-8">
                    A wordsmith who believes in the power of language to shape our world, inspire change, and connect us
                    all. I bring a unique perspective to the writing, blending the knowledge and experiences into
                    thought-provoking narratives.
                </p>
            </div>

        </div>
    </div>

    <section class="py-32">
        <div class="mb-12">
            <h3 class="block antialiased tracking-normal font-sans text-3xl font-semibold leading-snug text-blue-gray-900">
                {{ __('web/authors.view.recent_books.heading') }}
            </h3>
        </div>

        <div class="grid grid-cols-1 gap-10 md:grid-cols-2 lg:grid-cols-4">

            @foreach($topBooks as $book)
                <x-web.book-card :book="$book"/>
            @endforeach

            <div
                class="flex-col bg-clip-border rounded-xl text-gray-700 shadow-md relative grid h-full w-full place-items-center overflow-hidden bg-black">
                <div class="absolute inset-0 h-full w-full bg-gray-900/75"></div>
                <div class="p-6 relative w-full">
                    <h3 class="block antialiased tracking-normal font-sans text-3xl font-semibold leading-snug text-white mt-4"
                    >{{ __('web/authors.view.recent_books.call_heading') }}</h3>
                    <p class="block antialiased font-sans text-base leading-relaxed text-white py-4 font-normal"
                    >{{ __('web/authors.view.recent_books.call_desc') }}</p>

                    <div class="flex justify-end">
                        <div class="">
                            <a href="{{ route('web.books.index') }}"
                               class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg text-white hover:bg-white/10 active:bg-white/30 flex items-center gap-2"
                            >{{ __('web/authors.view.recent_books.call_action') }}
                                <x-heroicon-o-arrow-right class="h-3.5 w-3.5 text-white stroke-2"/>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

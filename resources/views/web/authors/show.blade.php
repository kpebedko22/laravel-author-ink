<?php
/**
 * @var App\Models\Author $author
 * @var Illuminate\Support\Collection<App\Models\Book> $topBooks
 */
?>

@extends('layouts.web.app')

@section('title', $author->name)

@section('content')

    <div class="rounded-2xl">
        {{-- TODO: add author cover --}}
        <div class="bg-gray-900 h-96 rounded-2xl">
        </div>

        <div class="container mx-auto px-8 lg:px-48 flex">
            <div class="absolute -translate-y-28">
                {{-- TODO: add author avatar --}}
                <div class="bg-amber-400 rounded-2xl w-40 h-40"></div>
            </div>

            <div class="mt-20">
                <div class="flex justify-between"><h5
                        class="block antialiased tracking-normal font-sans font-semibold text-inherit text-3xl"
                    >{{ $author->name }}</h5>
                    <button
                        class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg bg-gray-900 text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none"
                        type="button"
                    >{{ 'follow' }}</button>
                </div>
                {{-- TODO: make blade components --}}
                <div class="flex items-center gap-6">
                    <div class="flex items-center gap-2 mt-3">
                        <p class="block antialiased font-sans text-base leading-relaxed text-inherit !text-gray-900 font-bold"
                        >323</p>
                        <p class="block antialiased font-sans text-base leading-relaxed text-inherit !text-gray-500 font-normal"
                        >{{ 'Books' }}</p>
                    </div>
                    <div class="flex items-center gap-2 mt-3">
                        <p class="block antialiased font-sans text-base leading-relaxed text-inherit !text-gray-900 font-bold"
                        >{{ '3.5k' }}</p>
                        <p class="block antialiased font-sans text-base leading-relaxed text-inherit !text-gray-500 font-normal"
                        >{{ 'Followers' }}</p>
                    </div>
                    <div class="flex items-center gap-2 mt-3">
                        <p class="block antialiased font-sans text-base leading-relaxed text-inherit !text-gray-900 font-bold"
                        >{{ '260' }}</p>
                        <p class="block antialiased font-sans text-base leading-relaxed text-inherit !text-gray-500 font-normal"
                        >{{ 'Following' }}</p>
                    </div>
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
                {{ 'Check my latest books' }}
            </h3>
        </div>

        <div class="grid grid-cols-1 gap-10 md:grid-cols-2 lg:grid-cols-4">

            @foreach($topBooks as $book)
                <x-web.book-card :book="$book"/>
            @endforeach

            <div
                class="flex-col bg-clip-border rounded-xl text-gray-700 shadow-md relative grid h-full w-full place-items-center overflow-hidden bg-black">
                <div class="absolute inset-0 h-full w-full bg-gray-900/75"></div>
                <div class="p-6 relative w-full"><h3
                        class="block antialiased tracking-normal font-sans text-3xl font-semibold leading-snug text-white mt-4">
                        Discover all my articles</h3>
                    <p class="block antialiased font-sans text-base leading-relaxed text-white py-4 font-normal">I am a
                        versatile writer who explores a wide range of genres and topics.</p>
                    <button
                        class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg text-white hover:bg-white/10 active:bg-white/30 flex items-center gap-2"
                        type="button">read more
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                             stroke="currentColor" aria-hidden="true" class="h-3.5 w-3.5 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </section>

@endsection

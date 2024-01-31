<?php
/**
 * @var Illuminate\Pagination\LengthAwarePaginator $books
 */
?>

@extends('layouts.web.app')

@section('title', 'Книги')

@section('content')

    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 lg:gap-8">

        @foreach($books as $book)

            <div
                class="flex flex-col justify-between max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow ">
                <a href="{{ route('web.books.show', $book) }}">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900"
                    >{{ $book->name }}</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 "
                >{{ $book->description }}</p>
                <div class="">
                    <a href="{{ route('web.books.show', $book) }}"
                       class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 ">
                        Read more
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg"
                             fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </div>
        @endforeach

    </div>

    <div class="pt-4 sm:pt-6 lg:pt-8">
        {{ $books->links() }}
    </div>

@endsection

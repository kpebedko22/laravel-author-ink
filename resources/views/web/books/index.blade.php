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
            <x-web.book-card :book="$book"/>
        @endforeach

    </div>

    <div class="pt-4 sm:pt-6 lg:pt-8">
        {{ $books->links() }}
    </div>

@endsection

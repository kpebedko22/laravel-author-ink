<?php
/**
 * @var App\Models\Book $book
 */
?>

@extends('layouts.web.app')

@section('title', $book->name)

@section('content')

    <div class="flex justify-between">
        <div class=""></div>
        <article>
            <header class="mb-6">
                <h1 class="font-bold text-4xl mb-6">{{ $book->name }}</h1>
                <div class=" text-lg text-gray-500 italic">
                    <a href="{{ route('web.authors.show', $book->author) }}" class="text-black">
                        {{ $book->author->name }}
                    </a>
                    <time class=""
                          datetime="{{ $book->created_at->format('Y-m-d') }}"
                          title="{{ $book->created_at->format('M d, Y') }}"
                    >{{ $book->created_at->format('M d, Y') }}</time>
                </div>
            </header>

            <div class="">
                @foreach([1,2,3] as $index)
                    <p class="my-3 text-xl leading-8 text-gray-500 ">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eligendi
                        harum tempore cupiditate asperiores provident, itaque, quo ex iusto
                        rerum voluptatum delectus corporis quisquam maxime a ipsam nisi
                        sapiente qui optio! Dignissimos harum quod culpa officiis suscipit
                        soluta labore! Expedita quas, nesciunt similique autem, sunt,
                        doloribus pariatur maxime qui sint id enim. Placeat, maxime labore.
                        Dolores ex provident ipsa impedit, omnis magni earum. Sed fuga ex
                        ducimus consequatur corporis, architecto nesciunt vitae ipsum
                        consequuntur perspiciatis nulla esse voluptatem quos dolorum delectus
                        similique eum vero in est velit quasi pariatur blanditiis incidunt
                        quam.
                    </p>
                @endforeach
            </div>
        </article>


        {{--        <aside class="w-64">--}}
        {{--            <div class="border rounded-lg p-5">--}}
        {{--                <div class="">--}}
        {{--                    <img src="" alt="">--}}
        {{--                    <div class="">--}}
        {{--                        <div class="">{{ $book->author->name }}</div>--}}
        {{--                        <div class="">34k followers</div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--                <div class="">--}}
        {{--                    Hey! I'm Jese Leos. I'm a career-changer. Bootcamp grad & Dev.--}}
        {{--                </div>--}}

        {{--                <div class="">--}}
        {{--                    <div class="">LOCATION</div>--}}
        {{--                    <div class="">California, United States</div>--}}
        {{--                </div>--}}

        {{--                <div class="">--}}
        {{--                    <div class="">JOINED</div>--}}
        {{--                    <div class="">September 20, 2018</div>--}}
        {{--                </div>--}}

        {{--                <button>Follow</button>--}}
        {{--            </div>--}}
        {{--        </aside>--}}
    </div>
@endsection

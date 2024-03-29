<div class="flex flex-col justify-between p-6 bg-white border border-gray-200 rounded-xl shadow">

    {{-- TODO: add book cover image --}}
    {{--    <div--}}
    {{--        class="relative bg-clip-border rounded-xl overflow-hidden bg-white text-gray-700 shadow-lg mx-0 mt-0 mb-6 h-52">--}}
    {{--        <img alt="Hydrogen-Powered Vehicles"--}}
    {{--             loading="lazy"--}}
    {{--             width="768"--}}
    {{--             height="768"--}}
    {{--             decoding="async"--}}
    {{--             data-nimg="1"--}}
    {{--             class="h-full w-full object-cover"--}}
    {{--             src="/nextjs-tailwind-author-page/image/blogs/blog-1.png"--}}
    {{--             style="color: transparent;"--}}
    {{--        >--}}
    {{--    </div>--}}

    <a href="{{ route('web.books.show', $book) }}">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900"
        >{{ $book->name }}</h5>
    </a>
    <p class="mb-3 font-normal text-gray-700 "
    >{{ $book->description }}</p>

    <div class="flex justify-end">
        <div class="">
            <a href="{{ route('web.books.show', $book) }}"
               class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg text-gray-900 hover:bg-gray-900/10 active:bg-gray-900/20 flex items-center gap-2"
            >{{ 'Читать' }}
                <x-heroicon-o-arrow-right class="h-3.5 w-3.5 text-gray-900 stroke-2"/>
            </a>
        </div>
    </div>
</div>

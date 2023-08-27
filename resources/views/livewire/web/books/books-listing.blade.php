<div class="container p-4 mx-auto">
    <h1 class="font-semibold text-2xl font-bold text-gray-800">All Posts</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mt-4">
        @foreach($books as $book)
            <a href="#" class="block p-4 bg-white rounded shadow-sm hover:shadow overflow-hidden">
                <h2 class="truncate font-semibold text-lg text-gray-800">
                    {{ $book['name'] }}
                </h2>

                <p class="mt-2 text-gray-800">
                    {{ $book['genre'] }}
                </p>

                <p class="mt-2 text-gray-800">
                    {{ $book['author']['name'] }}
                </p>
            </a>
        @endforeach
    </div>

    @if ($hasMorePages)
        <div class="flex items-center justify-center mt-4">
            <button
                class="px-4 py-3 text-lg font-semibold text-white rounded-xl bg-green-500 hover:bg-green-400"
                wire:click="loadMoreTrigger"
            >
                Load More
            </button>
        </div>
    @endif

    {{ $paginator->links() }}
</div>

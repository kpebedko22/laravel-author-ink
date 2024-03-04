<?php
/**
 * @var Illuminate\Pagination\LengthAwarePaginator $authors
 */
?>

<div class="">
    <div class="pt-4 grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 lg:gap-8" id="paginated-authors">

        @foreach($authors as $author)
            <x-web.author-card :author="$author"/>
        @endforeach

    </div>

    <div class="pt-4 sm:pt-6 lg:pt-8">
        {{ $authors->links(data: ['scrollTo' => '#paginated-authors']) }}
    </div>
</div>

<?php
/**
 * @var Illuminate\Support\Collection<int, App\DTOs\Web\Authors\AuthorFollowerDTO> $followers
 * @var bool $listFollowings
 */

$transPrefix = 'web/followers.list_modal.' . ($listFollowings ? 'followings' : 'followers');
?>
<div class="bg-white">
    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
        <h3 class="text-xl font-semibold text-gray-900">
            {{ __("$transPrefix.heading") }}
        </h3>
        <button type="button"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                wire:click="$dispatch('closeModal')"
        >
            <x-heroicon-o-x-mark class="h-5 w-5 stroke-2"/>
            <span class="sr-only">Close modal</span>
        </button>
    </div>

    <div class="flex flex-col h-96 relative w-full bg-white divide-y overflow-y-auto">
        @foreach($followers as $follower)
            <a class="flex items-center gap-4 p-4"
               href="{{ route('web.authors.show', $follower->id) }}"
            >
                @if($follower->avatarUrl)
                    <img class="w-12 h-12 rounded-full"
                         src="{{ $follower->avatarUrl }}"
                         alt="{{ $follower->name }}"
                    >
                @else
                    {!! Avatar::setTheme('author-sm')->create($follower->name)->toSvg() !!}
                @endif
                <div class="flex flex-col">
                    <span class="text-slate-500 text-sm font-medium">{{ $follower->username }}</span>
                    <strong class="text-slate-900 text-sm font-medium">{{ $follower->name }}</strong>
                </div>
            </a>
        @endforeach

        @if($hasMore)
            <div
                x-data="{
                    observe: function () {
                        let observer = new IntersectionObserver((entries) => {
                            entries.forEach(entry => {
                                if (entry.isIntersecting) {
                                  $wire.loadMore();
                                }
                            })
                        }, {
                            root: null
                        })

                        observer.observe(this.$el);
                    }
                }"
                x-init="observe()"
            ></div>
        @endif
    </div>
</div>



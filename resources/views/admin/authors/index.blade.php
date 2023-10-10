@extends('layouts.admin.app')

@section('title', __('admin/author.label.index'))

@section('content')
    <x-admin.page.heading>
        <x-slot:heading>{{ __('admin/author.label.index') }}</x-slot:heading>
        <x-slot:actions>
            <x-admin.action :url="route('admin.authors.create')"
                            :label="__('admin/author.action.create.label')"
            />
        </x-slot:actions>
    </x-admin.page.heading>

    <x-admin.page.content>
        <div class="p-3 flex justify-between">
            <div class=""></div>
            <div class="">
                <form action="" method="GET">
                    <label>
                        <input name="q"
                               type="search"
                               {{--                               TODO: change --}}
                               placeholder="{{ 'Search' }}"
                               class="p-2 transition-all rounded-lg border border-gray-300 focus:outline-none focus:ring focus:border-blue-500"
                               value="{{ request()->input('q') }}"
                        >
                    </label>
                </form>
            </div>
        </div>

        <div class="overflow-x-auto">
            <x-admin.table>
                <x-slot:header>
                    <x-admin.table.heading>{{ __('admin/author.attribute.name') }}</x-admin.table.heading>
                    <x-admin.table.heading>{{ __('admin/author.attribute.email') }}</x-admin.table.heading>
                    <x-admin.table.heading>{{ __('admin/author.attribute.books_count') }}</x-admin.table.heading>
                    <x-admin.table.heading></x-admin.table.heading>
                </x-slot:header>

                <x-slot:body>
                    @php /** @var App\Models\Author $author */@endphp
                    @foreach($authors as $author)
                        <x-admin.table.row>
                            <x-admin.table.cell>{{ $author->name }}</x-admin.table.cell>
                            <x-admin.table.cell>{{ $author->email }}</x-admin.table.cell>
                            <x-admin.table.cell>{{ $author->books_count }}</x-admin.table.cell>
                            <x-admin.table.cell>
                                <div class="flex gap-3 justify-end">
                                    <x-admin.table.action.view
                                        :url="route('admin.authors.show', ['author_id' => $author->id])"
                                        :label="__('admin/author.action.view.label')"
                                    />

                                    <x-admin.table.action.edit
                                        :url="route('admin.authors.edit', ['author_id' => $author->id])"
                                        :label="__('admin/author.action.edit.label')"
                                    />

                                    <x-admin.table.action.delete
                                        :url="route('admin.authors.destroy', ['author_id' => $author->id])"
                                        :label="__('admin/author.action.delete.label')"
                                    />
                                </div>
                            </x-admin.table.cell>
                        </x-admin.table.row>
                    @endforeach
                </x-slot:body>
            </x-admin.table>
        </div>

        <div class="p-3">
            {{ $authors->links('components.admin.table.pagination') }}
        </div>
    </x-admin.page.content>
@endsection

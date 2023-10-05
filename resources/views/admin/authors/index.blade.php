@extends('layouts.admin.app')

@section('title')
    {{ 'Authors' }}
@endsection

@section('content')
    <div class="flex justify-between">
        <h1 class="text-3xl text-black pb-6">{{ 'Authors' }}</h1>
        <div class="">
            <x-admin.action :url="route('admin.authors.create')"
                            class="bg-primary-600 hover:bg-primary-500 text-dark-800 font-semibold"
            >{{ 'Create new author' }}</x-admin.action>
        </div>
    </div>

    <div class="shadow-md bg-white rounded-lg border border-gray-300">
        <div class="p-3 flex justify-between">
            <div class=""></div>
            <div class="">
                <form action="" method="GET">
                    <label>
                        <input name="q"
                               type="search"
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
                    <x-admin.table.heading>{{ 'Name' }}</x-admin.table.heading>
                    <x-admin.table.heading>{{ 'Email' }}</x-admin.table.heading>
                    <x-admin.table.heading>{{ 'Books count' }}</x-admin.table.heading>
                    <x-admin.table.heading></x-admin.table.heading>
                </x-slot:header>

                <x-slot:body>
                    @php /** @var \App\Models\Author $author */@endphp
                    @foreach($authors as $author)
                        <x-admin.table.row>
                            <x-admin.table.cell>{{ $author->name }}</x-admin.table.cell>
                            <x-admin.table.cell>{{ $author->email }}</x-admin.table.cell>
                            <x-admin.table.cell>{{ $author->books_count }}</x-admin.table.cell>
                            <x-admin.table.cell>
                                <div class="flex gap-3 justify-end">
                                    <x-admin.table.action.view
                                        :url="route('admin.authors.show', ['author_id' => $author->id])"
                                        :label="'View'"
                                    />

                                    <x-admin.table.action.edit
                                        :url="route('admin.authors.edit', ['author_id' => $author->id])"
                                        :label="'Edit'"
                                    />

                                    <x-admin.table.action.delete
                                        :url="route('admin.authors.destroy', ['author_id' => $author->id])"
                                        :label="'Delete'"
                                    />
                                </div>
                            </x-admin.table.cell>
                        </x-admin.table.row>
                    @endforeach
                </x-slot:body>
            </x-admin.table>
        </div>

        <div class="p-3">
            {{ $authors->links() }}
        </div>
    </div>
@endsection

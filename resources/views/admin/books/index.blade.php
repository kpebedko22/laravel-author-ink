@extends('layouts.admin.app')

@section('content')
    <div class="row">
        <div class="">
            <a class="btn btn-success"
               href="{{ route('admin.books.create') }}"
               role="button"
            >Add new book</a>
        </div>
    </div>

    <div class="pt-3">
        @component('admin.components.datatable', [
           'items' => $books,
           'data' => [
               [
                   'label' => 'Name',
                   'attribute' => 'name',
               ],
               [
                   'label' => 'Genre',
                   'attribute' => 'genre',
               ],
               [
                   'label' => 'Author',
                   'attribute' => fn(\App\Models\Book $book) => $book->author->name,
               ],
           ],
           'actions' => [
               [
                   'component' => 'admin.components.actions.view',
                   'url' => fn(\App\Models\Book $book) => route('admin.books.show', $book->id)
               ],
               [
                   'component' => 'admin.components.actions.edit',
                   'url' => fn(\App\Models\Book $book) => route('admin.books.edit', $book->id)
               ],
               [
                   'component' => 'admin.components.actions.delete',
                   'url' => fn(\App\Models\Book $book) => route('admin.books.destroy', $book->id)
               ],
           ],
       ])@endcomponent
    </div>
@endsection

@extends('admin.layouts.app')

@section('title')
    {{ 'Authors' }}
@endsection

@section('content')

    <div class="row">
        <div class="">
            <a class="btn btn-success"
               href="{{ route('admin.authors.create') }}"
               role="button"
            >Add new author</a>
        </div>
    </div>

    <div class="pt-3">
        @component('admin.components.datatable', [
           'items' => $authors,
           'data' => [
               [
                   'label' => 'Name',
                   'attribute' => 'name',
               ],
               [
                   'label' => 'Email',
                   'attribute' => 'email',
               ],
               [
                   'label' => 'Books count',
                   'attribute' => 'books_count',
               ],
           ],
           'actions' => [
               [
                   'component' => 'admin.components.actions.view',
                   'url' => fn(\App\Models\Author $author) => route('admin.authors.show', $author->id)
               ],
               [
                   'component' => 'admin.components.actions.edit',
                   'url' => fn(\App\Models\Author $author) => route('admin.authors.edit', $author->id)
               ],
               [
                   'component' => 'admin.components.actions.delete',
                   'url' => fn(\App\Models\Author $author) => route('admin.authors.destroy', $author->id)
               ],
           ],
       ])@endcomponent
    </div>
@endsection

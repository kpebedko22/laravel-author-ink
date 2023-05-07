@extends('admin.layouts.app')

@section('content')
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                @component('admin.components.details', [
                    'data' => [
                        'ID' => $model->id,
                        'Name' => $model->name,
                        'Year' => $model->year,
                        'Genre' => $model->genre,
                        'Author' => $model->author->name,
                    ],
                ])@endcomponent
                <form method="POST" action="{{ route('admin.books.destroy', $model->id) }}">
                    @method('DELETE')
                    @csrf
                    <a class="btn btn-warning" href="{{ route('admin.books.edit', $model->id) }}" role="button">Edit</a>
                    <button type="submit"
                            class="btn btn-danger"
                    >Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection

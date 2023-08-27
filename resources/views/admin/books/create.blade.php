@extends('layouts.admin.app')

@section('content')
    <div class="col-6">
        <h1>{{ $model->exists ? 'Edit book' : 'Create book' }}</h1>

        <x-validation-errors :errors="$errors"/>

        <form method="POST"
              action="{{ $model->exists ? route('admin.books.update', $model->id) : route('admin.books.store') }}"
        >
            @method($model->exists ? 'PUT' : 'POST')
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name"
                       value="{{ old('name', $model->name) }}">
            </div>
            <div class="mb-3">
                <label for="year" class="form-label">Year</label>
                <input type="number" class="form-control" id="year" name="year"
                       value="{{ old('year', $model->year) }}">
            </div>
            <div class="mb-3">
                <label for="genre" class="form-label">Genre</label>
                <input type="text" class="form-control" id="genre" name="genre"
                       value="{{ old('genre', $model->genre) }}">
            </div>

            <div class="mb-3">
                <label for="author_id" class="form-label">Author</label>
                <select class="form-select" name="author_id" id="author_id">
                    <option value="-1" {{ $model ? '' : 'selected' }}
                    >Choose the author
                    </option>
                    @foreach ($authors as $authorId => $authorName)
                        <option
                            value="{{ $authorId }}"
                            {{ $model->author_id === $authorId ? 'selected' : '' }}
                        >{{ $authorName }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">
                {{ $model->exists ? 'Apply changes' : 'Create' }}
            </button>
        </form>
    </div>
@endsection

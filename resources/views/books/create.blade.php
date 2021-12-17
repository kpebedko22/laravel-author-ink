@extends('index')

@section('content-inner')

    @if ($book)
        <h1>Editing book</h1>
    @else
        <h1>Creating book</h1>
    @endif

    <x-validation-errors :errors="$errors" />

    @if ($book)
        <form action="{{ route('admin.books.update', $book->id) }}" method="POST">
            @method('PUT')
        @else
            <form action="{{ route('admin.books.store') }}" method="POST">
                @method('POST')
    @endif
    @csrf

    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $book ? $book->name : '' }}">
    </div>
    <div class="mb-3">
        <label for="year" class="form-label">Year</label>
        <input type="number" class="form-control" id="year" name="year" value="{{ $book ? $book->year : '' }}">
    </div>
    <div class="mb-3">
        <label for="genre" class="form-label">Genre</label>
        <input type="text" class="form-control" id="genre" name="genre" value="{{ $book ? $book->genre : '' }}">
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Author</label>
        <select class="form-select" name="author_id">
            <option value="-1" {{ $book ? '' : 'selected' }}>Choose the author</option>
            @foreach ($authors as $author)
                <option value="{{ $author->id }}" {{ $book && $book->Author->id === $author->id ? 'selected' : '' }}>{{ $author->name }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-success">
        {{ $book ? 'Apply changes' : 'Create' }}
    </button>
    </form>

@endsection

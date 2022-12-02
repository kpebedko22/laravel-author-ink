@extends('index')

@section('content-inner')
    <div class="card">
        <h5 class="card-header">Book ID: {{ $book->id }}</h5>
        <div class="card-body">
            <h5 class="card-title">{{ $book->name }}</h5>
            <p class="card-text">Year: {{ $book->year }}</p>
            <p class="card-text">Genre: {{ $book->genre }}</p>
            <p class="card-text">Author: <a href="{{ route('admin.authors.show', $book->Author->id) }}">{{ $book->Author->name }}</a></p>
            <form method="POST" action="{{ route('admin.books.destroy', $book->id) }}">
                @method('DELETE')
                @csrf
                <a class="btn btn-warning" href="{{ route('admin.books.edit', $book->id) }}" role="button">Edit</a>
                <button type="submit" class="btn btn-danger"">Delete</button>
            </form>
        </div>
    </div>
@endsection

@extends('index')

@section('content-inner')

    <x-validation-errors :errors="$errors" />

    <a class="btn btn-success" href="{{ route('admin.books.create') }}" role="button">Add new book</a>

    @if (count($books) < 1)
        <div class="alert alert-warning" role="alert">
            No books in DB...
        </div>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Year</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Author</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <th scope="row">{{ $book->id }}</th>
                        <td><a href="{{ route('admin.books.show', $book->id) }}">{{ $book->name }}</a></td>
                        <td>{{ $book->year }}</td>
                        <td>{{ $book->genre }}</td>
                        <td><a href="{{ route('admin.authors.show', $book->Author->id) }}">{{ $book->Author->name }}</a></td>
                        <td>
                            <form method="POST" action="{{ route('admin.books.destroy', $book->id) }}">
                                @method('DELETE')
                                @csrf
                                <a class="btn btn-warning" href="{{ route('admin.books.edit', $book->id) }}" role="button">Edit</a>
                                <button type="submit" class="btn btn-danger"">Delete</button>
                    </form>
                </td>
            </tr>
             @endforeach
            </tbody>
        </table>
    @endif

@endsection

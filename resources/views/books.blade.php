@extends('index')

@section('books.index')

<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Название книги</th>
            <th scope="col">Год издания</th>
            <th scope="col">Жанр</th>
            <th scope="col">Автор</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($books as $book)
        <tr>
            <th scope="row">{{ $book->id }}</th>
            <td>{{ $book->name }}</td>
            <td>{{ $book->year }}</td>
            <td>{{ $book->genre }}</td>
            <td>{{ $book->Author->name }}</td>
        </tr>
        @endforeach
    </tbody>
</table>


@endsection
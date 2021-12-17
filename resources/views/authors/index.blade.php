@extends('index')

@section('content-inner')

<a class="btn btn-success" href="{{ route('admin.authors.create') }}" role="button">Add new author</a>

<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Birthday</th>
            <th scope="col">Books count</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($authors as $author)
        <tr>
            <th scope="row">{{ $author->id }}</th>
            <td><a href="{{ route('admin.authors.show', $author->id) }}">{{ $author->name }}</a></td>
            <td>{{ $author->birthday }}</td>
            <td>{{ count($author->Books) }}</td>
            <td>
                <form method="POST" action="{{ route('admin.authors.destroy', $author->id) }}">
                    @method('DELETE')
                    @csrf
                    <a class="btn btn-warning" href="{{ route('admin.authors.edit', $author->id)}}" role="button">Edit</a>
                    <button type="submit" class="btn btn-danger"">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


@endsection
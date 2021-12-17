@extends('index')

@section('content-inner')
    <div class="card">
        <h5 class="card-header">Author ID: {{ $author->id }}</h5>
        <div class="card-body">
            <h5 class="card-title">{{ $author->name }}</h5>
            <p class="card-text">Username: {{ $author->username }}</p>
            <p class="card-text">Email: {{ $author->email }}</p>
            <p class="card-text">Birthday: {{ $author->birthday }}</p>
            <p class="card-text">Is admin: @if ($author->is_admin) Yes @else Nope @endif</p>
            <form method="POST" action="{{ route('admin.authors.destroy', $author->id) }}">
                @method('DELETE')
                @csrf
                <a class="btn btn-warning" href="{{ route('admin.authors.edit', $author->id) }}" role="button">Edit</a>
                <button type="submit" class="btn btn-danger"">Delete</button>
            </form>
        </div>
    </div>
@endsection

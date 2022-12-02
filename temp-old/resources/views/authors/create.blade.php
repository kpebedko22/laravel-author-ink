@extends('index')

@section('content-inner')

    @if ($author)
        <h1>Editing author</h1>
    @else
        <h1>Creating author</h1>
    @endif

    <x-validation-errors :errors="$errors" />

    @if ($author)
        <form action="{{ route('admin.authors.update', $author->id) }}" method="POST">
            @method('PUT')
        @else
            <form action="{{ route('admin.authors.store') }}" method="POST">
                @method('POST')
    @endif
    @csrf

    <input hidden name="id" value="{{ $author ? $author->id : '' }}">

    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $author ? $author->email : '' }}">
    </div>
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" value="{{ $author ? $author->username : '' }}">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" value="{{ $author ? $author->password : '' }}">
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $author ? $author->name : '' }}">
    </div>
    <div class="mb-3">
        <label for="birthday" class="form-label">Birthday</label>
        <input type="date" class="form-control" id="birthday" name="birthday" value="{{ $author ? date('Y-m-d', strtotime($author->birthday)) : '' }}">
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="is_admin" name="is_admin" {{ $author && $author->is_admin ? 'checked' : '' }}>
        <label class="form-check-label" for="is_admin">
            Is admin
        </label>
    </div>

    <button type="submit" class="btn btn-success">
        {{ $author ? 'Apply changes' : 'Create' }}
    </button>
    </form>

@endsection

@php
    /**
     * @var \App\Models\Author $model
     */
@endphp

@extends('layouts.admin.app')

@section('title')
    {{'Create author'}}
@endsection

@section('content')
    <div class="col-6">
        <h1>{{ $model->exists ? 'Editing author' : 'Creating author' }}</h1>

        <x-validation-errors :errors="$errors"/>

        <form method="POST"
              action="{{ $model->exists ? route('admin.authors.update', $model->id) : route('admin.authors.store') }}"
        >
            @csrf
            @method($model->exists ?'PUT' : 'POST')

            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email"
                       value="{{ old('email', $model->email) }}">
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username"
                       value="{{ old('username', $model->username) }}">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name"
                       value="{{ old('name', $model->name) }}">
            </div>
            <div class="mb-3">
                <label for="birthday" class="form-label">Birthday</label>
                <input type="date" class="form-control" id="birthday" name="birthday"
                       value="{{ $model ? date('Y-m-d', strtotime($model->birthday)) : '' }}">
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="is_admin"
                       name="is_admin" {{ old('is_admin', $model->is_admin) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_admin">
                    Is admin
                </label>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password"
                       value="">
            </div>

            <button type="submit" class="btn btn-success">
                {{ $model->exists ? 'Apply changes' : 'Create' }}
            </button>
        </form>

    </div>

@endsection

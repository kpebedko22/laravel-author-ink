@php
    /**
     * @var \App\Models\Author $model
     */
@endphp

@extends('admin.layouts.app')

@section('title')
    {{ 'Show author' }}
@endsection
@section('content')
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                @component('admin.components.details', [
                    'data' => [
                        'ID' => $model->id,
                        'Name' => $model->name,
                        'Username' => $model->username,
                        'Email' => $model->email,
                        'Birthday' => $model->birthday,
                        'Is admin' => $model->is_admin ? 'Yes' : 'Nope'
                    ],
                ])@endcomponent

                <form method="POST" action="{{ route('admin.authors.destroy', $model->id) }}">
                    @method('DELETE')
                    @csrf
                    <a class="btn btn-warning" href="{{ route('admin.authors.edit', $model->id) }}"
                       role="button">Edit</a>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>

@endsection

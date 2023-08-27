@php /** @var \App\Models\Author $model */ @endphp

@extends('layouts.admin.app')

@section('title')
    {{ 'Show author' }}
@endsection
@section('content')
    <x-admin.detail>
        <x-admin.detail.item>
            <x-admin.detail.label>ID</x-admin.detail.label>
            <x-admin.detail.value>{{ $model->id }}</x-admin.detail.value>
        </x-admin.detail.item>

        <x-admin.detail.item>
            <x-admin.detail.label>Name</x-admin.detail.label>
            <x-admin.detail.value>{{ $model->name }}</x-admin.detail.value>
        </x-admin.detail.item>

        <x-admin.detail.item>
            <x-admin.detail.label>Username</x-admin.detail.label>
            <x-admin.detail.value>{{ $model->username }}</x-admin.detail.value>
        </x-admin.detail.item>

        <x-admin.detail.item>
            <x-admin.detail.label>Email</x-admin.detail.label>
            <x-admin.detail.value>{{ $model->email }}</x-admin.detail.value>
        </x-admin.detail.item>

        <x-admin.detail.item>
            <x-admin.detail.label>Birthday</x-admin.detail.label>
            <x-admin.detail.value>{{ $model->birthday }}</x-admin.detail.value>
        </x-admin.detail.item>

        <x-admin.detail.item>
            <x-admin.detail.label>Is admin</x-admin.detail.label>
            <x-admin.detail.value>{{ $model->is_admin ? 'true' : 'false' }}</x-admin.detail.value>
        </x-admin.detail.item>
    </x-admin.detail>


    {{--    <div class="col-6">--}}
    {{--        <div class="card">--}}
    {{--            <div class="card-body">--}}
    {{--                @component('admin.components.details', [--}}
    {{--                    'data' => [--}}
    {{--                        'ID' => $model->id,--}}
    {{--                        'Name' => $model->name,--}}
    {{--                        'Username' => $model->username,--}}
    {{--                        'Email' => $model->email,--}}
    {{--                        'Birthday' => $model->birthday,--}}
    {{--                        'Is admin' => $model->is_admin ? 'Yes' : 'Nope'--}}
    {{--                    ],--}}
    {{--                ])@endcomponent--}}

    {{--                <form method="POST" action="{{ route('admin.authors.destroy', $model->id) }}">--}}
    {{--                    @method('DELETE')--}}
    {{--                    @csrf--}}
    {{--                    <a class="btn btn-warning" href="{{ route('admin.authors.edit', $model->id) }}"--}}
    {{--                       role="button">Edit</a>--}}
    {{--                    <button type="submit" class="btn btn-danger">Delete</button>--}}
    {{--                </form>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
@endsection

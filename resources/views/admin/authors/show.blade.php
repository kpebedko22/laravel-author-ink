@php /** @var App\Models\Author $model */ @endphp

@extends('layouts.admin.app')

@section('title', __('admin/author.label.view'))

@section('content')
    <x-admin.page.heading>
        <x-slot:heading>{{ __('admin/author.label.view') }}</x-slot:heading>
        <x-slot:actions>
            <x-admin.action :url="route('admin.authors.edit', ['author_id' => $model->id])"
                            :label="__('admin/author.action.edit.label')"
            />

            <x-admin.action :url="route('admin.authors.destroy', ['author_id' => $model->id])"
                            :label="__('admin/author.action.delete.label')"
                            color="danger"
                            formMethod="delete"
            />
        </x-slot:actions>
    </x-admin.page.heading>

    <x-admin.page.content>
        <x-admin.detail>
            <x-admin.detail.item>
                <x-admin.detail.label>{{ __('admin/author.attribute.id') }}</x-admin.detail.label>
                <x-admin.detail.value>{{ $model->id }}</x-admin.detail.value>
            </x-admin.detail.item>

            <x-admin.detail.item>
                <x-admin.detail.label>{{ __('admin/author.attribute.name') }}</x-admin.detail.label>
                <x-admin.detail.value>{{ $model->name }}</x-admin.detail.value>
            </x-admin.detail.item>

            <x-admin.detail.item>
                <x-admin.detail.label>{{ __('admin/author.attribute.username') }}</x-admin.detail.label>
                <x-admin.detail.value>{{ $model->username }}</x-admin.detail.value>
            </x-admin.detail.item>

            <x-admin.detail.item>
                <x-admin.detail.label>{{ __('admin/author.attribute.email') }}</x-admin.detail.label>
                <x-admin.detail.value>{{ $model->email }}</x-admin.detail.value>
            </x-admin.detail.item>

            <x-admin.detail.item>
                <x-admin.detail.label>{{ __('admin/author.attribute.birthday') }}</x-admin.detail.label>
                <x-admin.detail.value>{{ $model->birthday }}</x-admin.detail.value>
            </x-admin.detail.item>

            <x-admin.detail.item>
                <x-admin.detail.label>{{ __('admin/author.attribute.is_admin') }}</x-admin.detail.label>
                <x-admin.detail.value>{{ $model->is_admin ? 'true' : 'false' }}</x-admin.detail.value>
            </x-admin.detail.item>
        </x-admin.detail>
    </x-admin.page.content>
@endsection

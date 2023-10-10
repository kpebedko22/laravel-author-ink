@php /** @var App\Models\Author $model */ @endphp

@extends('layouts.admin.app')
@section('title', __('admin/author.label.' . ($model->exists ? 'edit' : 'create')))

@section('content')
    <x-admin.page.heading>
        <x-slot:heading>{{ __('admin/author.label.' . ($model->exists ? 'edit' : 'create')) }}</x-slot:heading>
    </x-admin.page.heading>

    <x-admin.page.content class="xl:w-1/2 lg:w-2/3">
        <form method="POST"
              action="{{ $model->exists ? route('admin.authors.update', $model->id) : route('admin.authors.store') }}"
              class="p-5"
        >
            @csrf
            @method($model->exists ? 'PUT' : 'POST')

            <div class="mt-4">
                <x-admin.form.label for="email" :value="__('admin/author.attribute.email')"/>
                <div class="mt-2">
                    <x-admin.form.input type="email"
                                        name="email"
                                        value="{{ old('email', $model->email) }}"
                                        :required="true"
                    />
                    <x-admin.form.error name="email"/>
                </div>
            </div>

            <div class="mt-4">
                <x-admin.form.label for="username" :value="__('admin/author.attribute.username')"/>
                <div class="mt-2">
                    <x-admin.form.input type="text"
                                        name="username"
                                        value="{{ old('username', $model->username) }}"
                                        :required="true"
                    />
                    <x-admin.form.error name="username"/>
                </div>
            </div>

            <div class="mt-4">
                <x-admin.form.label for="name" :value="__('admin/author.attribute.name')"/>
                <div class="mt-2">
                    <x-admin.form.input type="text"
                                        name="name"
                                        value="{{ old('name', $model->name) }}"
                                        :required="true"
                    />
                    <x-admin.form.error name="name"/>
                </div>
            </div>

            <div class="mt-4">
                <x-admin.form.label for="birthday" :value="__('admin/author.attribute.birthday')"/>
                <div class="mt-2">
                    <x-admin.form.input type="date"
                                        name="birthday"
                                        value="{{ old('birthday', $model->birthday) }}"
                                        :required="true"
                    />
                    <x-admin.form.error name="birthday"/>
                </div>
            </div>

            <div class="mt-4">
                <x-admin.form.checkbox name="is_admin"
                                       :checked="old('is_admin', $model->is_admin)"
                >
                    <x-admin.form.label for="is_admin" :value="__('admin/author.attribute.is_admin')"/>
                </x-admin.form.checkbox>
            </div>

            <div class="mt-4">
                <x-admin.form.label for="password" :value="__('admin/author.attribute.password')"/>
                <div class="mt-2">
                    <x-admin.form.input type="password"
                                        name="password"
                                        value=""
                                        :required="true"
                                        autocomplete="new-password"
                    />
                    <x-admin.form.error name="password"/>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="button"
                        class="text-sm rounded-md px-3 py-2 font-semibold leading-6 text-gray-900 shadow-lg"
                >{{ 'Cancel' }}</button>
                <button type="submit"
                        class="px-3 py-2 text-sm rounded-md transition-all shadow-lg bg-primary-600 hover:bg-primary-500 font-semibold text-dark-800 focus:outline-none focus:bg-primary-500 "
                > {{ $model->exists ? 'Apply changes' : 'Create' }}</button>
            </div>
        </form>
    </x-admin.page.content>
@endsection

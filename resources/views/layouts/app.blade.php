<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="flex flex-col min-h-screen">
    @include('layouts.web.partials.header')

    <main class="container xl:max-w-screen-xl mx-auto p-5 flex-grow">
        <x-web.notification/>

        {{ $slot }}
    </main>

    @include('layouts.web.partials.footer')
</div>

@livewire('wire-elements-modal')
</body>
</html>

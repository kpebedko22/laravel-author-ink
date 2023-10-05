<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-primary-100">

@include('layouts.admin.partials.sidebar')

<div class=" w-full flex flex-col h-screen overflow-y-hidden">

    @include('layouts.admin.partials.navbar')

    <div class="w-screen sm:pl-64 h-screen overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">

            @include('layouts.admin.partials.notifications')

            @yield('content')
        </main>
    </div>
</div>

@stack('scripts')

</body>
</html>

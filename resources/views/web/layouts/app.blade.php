<!DOCTYPE html>
<html class="h-full" lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel App</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    @livewireStyles
</head>
<body class="font-sans antialiased bg-gray-50 h-full">

<main class="mt-12 min-h-full pb-56">
    @yield('content')
</main>

@livewireScripts
</body>
</html>

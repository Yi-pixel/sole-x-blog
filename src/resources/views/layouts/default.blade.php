<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark:bg-gray-800">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @stack('meta')
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <script src="{{ mix('js/app.js') }}" defer></script>
    @stack('css')
    @stack('js')
</head>
<body>
@include('blog::partials.header')

@yield('content')
@livewireScripts
</body>
</html>
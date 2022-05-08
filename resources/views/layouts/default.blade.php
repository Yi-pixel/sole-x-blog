<!doctype html>
<html lang="zh-Hans" class="dark:bg-gray-800 han-init">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="light dark">
    @stack('meta')
    <title>@yield('title')</title>
    @livewireStyles
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @stack('css')
</head>
<body>
@include('blog::partials.header')

@yield('content')

@include('blog::partials.footer')
@livewireScripts
<script src="{{ mix('js/app.js') }}" defer></script>
@stack('js')
</body>
</html>

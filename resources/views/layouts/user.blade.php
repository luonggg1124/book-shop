<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" type="image/x-icon" href="{{ asset('laravel-icon.png') }}">
        <title>{{ config('app.title') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css',
                'resources/css/base.css',
                'resources/css/main.css',
                'resources/css/cart.css',
                'resources/css/test.css',
                'resources/css/fontawesome-free-6.4.2-web/css/all.min.css',
                'resources/js/app.js'])

    </head>
    <body class="">
        @include('custom.layouts.header')
        {{ $slot }}
       
    </body>
</html>

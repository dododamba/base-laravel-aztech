<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    @include('layouts.front._css')
     @yield('css')
</head>
<body>
    @include('layouts.front._header')
    @include('layouts.front._breadcumbs')

        <main class="py-4">
           <div id="app">
            @yield('content')
           </div>
        </main>

        @include('layouts.front._footer')
        @include('layouts.front._js')

    </body>
</html>

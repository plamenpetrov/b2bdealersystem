<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <meta name="viewport" content="width=device-width, initial-scale=0.6, maximum-scale=0.6, user-scalable=0">
        @include('partials.css')
        @include('partials.js')
    </head>
    <body>
        @if (Auth::guest())
            @yield('login')
        @else
            <div class="container">
                @include('partials.messaging')
                @include('partials.navigation')
                @yield('content')
            </div>
        @endif
    </body>
</html>

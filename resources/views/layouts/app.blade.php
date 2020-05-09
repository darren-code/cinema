<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        @section('navbar')
            
        @endsection

        @section('sidebar')
            This is the master sidebar.
        @endsection

        <div class="container">
            @yield('content')
        </div>

        @extends('cdn.js')
    </body>
</html>
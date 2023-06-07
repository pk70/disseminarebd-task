<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css.map') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css.map') }}">

    </head>
    <body>
        <div class="wrapper">

            @include('top-bar')

            {{-- @include('side-bar') --}}

            <div class="content-wrapper">
                @yield('content')
            </div>
            <div class="clearfix">...</div>
            @include('footer')

        </div>
    </body>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    {{-- <script src="{{ asset('js/bootstrap.js.map') }}"></script> --}}
    {{-- <script src="{{ asset('js/bootstrap.min.js.map') }}"></script> --}}
</html>

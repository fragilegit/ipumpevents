<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- icons -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
    <link href="{{ asset('zoe/style.css') }}" rel="stylesheet">
    
    {{-- <link href="https://bootswatch.com/4/solar/bootstrap.min.css" rel="stylesheet"> --}}

</head>
<body>
    <div class="preloader-background">
        <i class="fa fa-spinner fa-pulse fa-spin fa-4x fa-lg" color="#3F729B" aria-hidden="true"></i>
    </div>
    <div id="app">
        <main class="container-fluid">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ URL::asset('zoe/script.js') }}"></script>
    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.2.0/anime.min.js"></script>
</body>
</html>

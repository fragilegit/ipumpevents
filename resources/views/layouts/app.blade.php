<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>@yield('title', config('app.name'))</title>

    <!-- Scripts -->
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- icons -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
     <!-- Bootstrap 3.3.7 -->
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link href="https://bootswatch.com/4/solar/bootstrap.min.css" rel="stylesheet">
    
</head>

<body>
    
    <div class="preloader-background">
        <i class="fa fa-spinner fa-pulse fa-spin fa-4x fa-lg" color="#3F729B" aria-hidden="true"></i>
    </div>
    {{-- <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 alert-warning z-index">
                Website is under testing, some functions are under development!
            </div>
        </div>
    </div> --}}
    
    @include('inc.navbar')
    <div id="app" class="">
        {{-- <main class="py-4"> --}}
        <main class="">
            @yield('content')
        </main>
        @include('inc.footer')
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    {{-- <script src="http://code.jquery.com/jquery.js"></script> --}}
  
    @yield('script')
   
</body>

</html>

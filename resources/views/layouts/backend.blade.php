<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>@yield('title', config('app.name'))</title>
        {{-- {{ config('app.name', 'Laravel') }} --}}
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href=" {{ asset('backend/css/bootstrap.min.css') }}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('backend/css/font-awesome.min.css') }}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{ asset('backend/css/ionicons.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('backend/css/AdminLTE.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/backend/css/skins/_all-skins.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/backend/css/custom.css') }}">
        <!-- markdown editor -->
        <link rel="stylesheet" href="{{ asset('/backend/plugins/simple-mde/simplemde.min.css') }}">
        
        <link rel="stylesheet" href="{{ asset('/backend/plugins/jasny-bootstrap/css/jasny-bootstrap.min.css') }}">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
        
        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    {{-- sidebar-collapse --}}
    <body class="hold-transition skin-purple  sidebar-mini">
        <div class="row">
                <div class="col-sm-12 alert-warning container z-index">
                    Website is under testing, some functions are under development!
                </div>
            </div>
        <div class="preloader-background">
            <i class="fa fa-spinner fa-pulse fa-spin fa-4x fa-lg" color="#3F729B" aria-hidden="true"></i>
        </div>
        <div class="wrapper">
            @include('inc.backend.navbar')
            @include('inc.backend.sidebar')
            @yield('content')
            @include('inc.backend.footer')
        </div>
       
        <!-- jQuery 3 -->
        <script src="{{ asset('backend/js/jquery.min.js') }}"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
        <!-- SlimScroll -->
        <script src="{{ asset('backend/js/jquery.slimscroll.min.js') }}"></script>
        <!-- FastClick -->
        <script src="{{ asset('backend/js/fastclick.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('backend/js/adminlte.min.js') }}"></script>
        <!-- AdminLTE for demo purposes -->
        {{-- <script src="{{ asset('backend/js/demo.js') }}"></script> --}}
        <!-- scripts -->
        <script src="{{ asset('backend/js/custom.js') }}"></script>
        @yield('script')
    </body>
</html>
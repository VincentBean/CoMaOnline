
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <link rel="icon" href="">
    <link rel="shortcut icon" href=""/>


    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <!-- Icons -->
    <link href="{{asset('vendor/nucleo/css/nucleo.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

    <!-- Theme CSS -->
    <link type="text/css" href="{{asset('css/argon.min.css')}}" rel="stylesheet">


  </head>
  <body>

    @include('layouts.frontend.menu')

    @yield('body')
    
    @include('layouts.frontend.footer')
    
    <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- Core -->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/popper/popper.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/bootstrap.min.js')}}"></script>

    <!-- Theme JS -->
    <script src="{{asset('js/argon.min.js')}}"></script>

  </body>
</html>

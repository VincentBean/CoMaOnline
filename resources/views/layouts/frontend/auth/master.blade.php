
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <!-- Theme CSS -->
    <link type="text/css" href="{{asset('css/argon.min.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('css/style.css')}}" rel="stylesheet">


  </head>
  <body class="registeren" style="background-image: url(https://images.pexels.com/photos/616404/pexels-photo-616404.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260);">

    @include('layouts.frontend.menu')

    @yield('body')
        
    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/popper/popper.min.js')}}"></script>

    <!-- Core -->
    <script src="{{asset('vendor/bootstrap/bootstrap.min.js')}}"></script>

    <!-- Theme JS -->
    <script src="{{asset('js/argon.min.js')}}"></script>

  </body>
</html>

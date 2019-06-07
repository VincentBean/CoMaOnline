
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
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>@yield('title')</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

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
  <body>

    @include('layouts.frontend.menu')

    @yield('body')
    
    @include('layouts.frontend.footer')
    
    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/popper/popper.min.js')}}"></script>

    <!-- Core -->
    <script src="{{asset('vendor/bootstrap/bootstrap.min.js')}}"></script>

    <!-- Theme JS -->
    <script src="{{asset('js/argon.min.js')}}"></script>

    {{-- Handle searchsuggestions --}}
    <script>
        $(document).ready(function(){
         $('#search').keyup(function(){
                var query = $(this).val();
                if(query != '')
                {
                    var _token = $('input[name="_token"]').val();
                 $.ajax({
                  url:"{{ route('fetch') }}",
                  method:"POST",
                  data:{query:query, _token:_token},
                  success:function(data){
                   $('#productlist').fadeIn();
                            $('#productlist').html(data);
                  }
                 });
                }
                else
                {
                    $('#productlist').fadeOut();
                }
            });
            $('#search').focusout(function(){
                $('#productlist').fadeOut();
            });
            $('#search').focusin(function(){
                $('#productlist').fadeIn();
            });
        });
    </script>

  </body>
</html>

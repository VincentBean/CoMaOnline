<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!--  Social tags  -->
    <meta name="keywords" content="">
    <meta name="description" content="">

    <title>@yield('title')</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/dashboard-style.css')}}">
    <!-- CSS Files -->
    <link href="https://material-dashboard-laravel.creative-tim.com/material/css/material-dashboard.css?v=2.1.3" rel="stylesheet" />

    <!-- include summernote css/js -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />



</head>

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="azure" data-background-color="white"
            data-image="{{asset('img/backgrounds/admin-sidebar-bg.jpeg')}}">
            <!--
            Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

            Tip 2: you can also add an image using data-image tag
            -->
            <div class="logo">
                <a href="#" class="simple-text logo-normal">
                    CoMa Online
                </a>
            </div>
            <div class="sidebar-wrapper">

                @include('layouts.backend-customer.sidemenu')

            </div>
        </div>
        <div class="main-panel">

            @include('layouts.backend-customer.menu')

            <div class="content">
                <div class="container-fluid">
                    @yield('body')
                </div>
            </div>
        </div>


        <!--   Core JS Files   -->
        <script src="https://material-dashboard-laravel.creative-tim.com/material/js/core/jquery.min.js"></script>
        <script src="https://material-dashboard-laravel.creative-tim.com/material/js/core/popper.min.js"></script>
        <script
            src="https://material-dashboard-laravel.creative-tim.com/material/js/core/bootstrap-material-design.min.js"></script>
        <script
            src="https://material-dashboard-laravel.creative-tim.com/material/js/plugins/perfect-scrollbar.jquery.min.js"></script>
        <!-- Plugin for the momentJs  -->
        <script src="https://material-dashboard-laravel.creative-tim.com/material/js/plugins/moment.min.js"></script>
        <!--  Plugin for Sweet Alert -->
        <script src="https://material-dashboard-laravel.creative-tim.com/material/js/plugins/sweetalert2.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

        <!-- Forms Validations Plugin -->
        <script
            src="https://material-dashboard-laravel.creative-tim.com/material/js/plugins/jquery.validate.min.js"></script>
        <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
        <script
            src="https://material-dashboard-laravel.creative-tim.com/material/js/plugins/jquery.bootstrap-wizard.js"></script>
        <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
        <script
            src="https://material-dashboard-laravel.creative-tim.com/material/js/plugins/bootstrap-selectpicker.js"></script>
        <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
        <script
            src="https://material-dashboard-laravel.creative-tim.com/material/js/plugins/bootstrap-datetimepicker.min.js"></script>
        <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
        <script
            src="https://material-dashboard-laravel.creative-tim.com/material/js/plugins/jquery.dataTables.min.js"></script>
        <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
        <script
            src="https://material-dashboard-laravel.creative-tim.com/material/js/plugins/bootstrap-tagsinput.js"></script>
        <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
        <script
            src="https://material-dashboard-laravel.creative-tim.com/material/js/plugins/jasny-bootstrap.min.js"></script>
        <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
        <script
            src="https://material-dashboard-laravel.creative-tim.com/material/js/plugins/fullcalendar.min.js"></script>
        <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
        <script
            src="https://material-dashboard-laravel.creative-tim.com/material/js/plugins/jquery-jvectormap.js"></script>
        <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
        <script
            src="https://material-dashboard-laravel.creative-tim.com/material/js/plugins/nouislider.min.js"></script>
        <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
        <!-- Library for adding dinamically elements -->
        <script src="https://material-dashboard-laravel.creative-tim.com/material/js/plugins/arrive.min.js"></script>
        <!-- Chartist JS -->
        <script src="https://material-dashboard-laravel.creative-tim.com/material/js/plugins/chartist.min.js"></script>
        <!--  Notifications Plugin    -->
        <script
            src="https://material-dashboard-laravel.creative-tim.com/material/js/plugins/bootstrap-notify.js"></script>
        <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="https://material-dashboard-laravel.creative-tim.com/material/js/material-dashboard.js?v=2.1.1"
            type="text/javascript"></script>


        <script>
            $(document).ready(function () {
                // Javascript method's body can be found in assets/js/demos.js
                md.initDashboardPageCharts();
            });
        </script>
</body>

</html>
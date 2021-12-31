<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>{{ $title }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('templete/dist/css/font-awesome.min.css') }}">

    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('templete/dist/css/ionicons.min.css') }}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('templete/dist/css/adminlte.min.css') }}">

    <!-- bootstrap rtl -->
    <link rel="stylesheet" href="{{ asset('templete/dist/css/bootstrap-rtl.min.css') }}">
    <!-- template rtl version -->
    <link rel="stylesheet" href="{{ asset('templete/dist/css/custom-style.css') }}">

    {{ $styles ?? '' }}


</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
    @include('partials.navbar')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('partials.dashboard-sidebar')

    {{ $slot }}

</div>
<!-- /.content-wrapper -->



<!-- jQuery -->
<script src="{{ asset('templete/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('templete/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('templete/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('templete/plugins/fastclick/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('templete/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('templete/dist/js/demo.js') }}"></script>

{{ $script ?? '' }}

</body>
</html>

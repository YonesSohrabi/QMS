<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $title ?? 'بدون عنوان' }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('templete/dist/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('templete/dist/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('templete/dist/css/adminlte.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('templete/plugins/iCheck/square/blue.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- bootstrap rtl -->
    <link rel="stylesheet" href="{{ asset('templete/dist/css/bootstrap-rtl.min.css') }}">
    <!-- template rtl version -->
    <link rel="stylesheet" href="{{ asset('templete/dist/css/custom-style.css') }}">

    {{ $styles ?? '' }}
</head>
<body class="hold-transition register-page">
<div class="register-box">
    <div class="register-logo">
        <b>{{ $head_title ?? 'بدون عنوان' }}</b>
    </div>

    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">{{ $header_form ?? 'بدون عنوان' }}</p>

            {{ $slot }}

        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{ asset('templete/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('templete/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- iCheck -->
<script src="{{ asset('templete/plugins/iCheck/icheck.min.js') }}"></script>

{{ $script ?? '' }}
</body>
</html>

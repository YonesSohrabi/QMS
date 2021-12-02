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

    <!-- Google Font: Source Sans Pro -->
    <link
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700"
        rel="stylesheet"
    />

    <!-- bootstrap rtl -->
    <link rel="stylesheet" href="{{ asset('templete/dist/css/bootstrap-rtl.min.css') }}">
    <!-- template rtl version -->
    <link rel="stylesheet" href="{{ asset('templete/dist/css/custom-style.css') }}">

    {{ $styles ?? '' }}


</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
    <nav
        class="
          main-header
          navbar navbar-expand
          bg-white
          navbar-light
          border-bottom
        "
    >
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"
                ><i class="fa fa-bars"></i
                    ></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="../../index3.html" class="nav-link">خانه</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">تماس</a>
            </li>
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input
                    class="form-control form-control-navbar"
                    type="search"
                    placeholder="جستجو"
                    aria-label="Search"
                />
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>

        <!-- Right navbar links -->
        <ul class="navbar-nav mr-auto">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fa fa-comments-o"></i>
                    <span class="badge badge-danger navbar-badge">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img
                                src="{{ asset('templete/dist/img/user1-128x128.jpg') }}"
                                alt="User Avatar"
                                class="img-size-50 ml-3 img-circle"
                            />
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    یونس سهرابی
                                    <span class="float-left text-sm text-danger"
                                    ><i class="fa fa-star"></i
                                        ></span>
                                </h3>
                                <p class="text-sm">با من تماس بگیر لطفا...</p>
                                <p class="text-sm text-muted">
                                    <i class="fa fa-clock-o mr-1"></i> 4 ساعت قبل
                                </p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img
                                src="{{ asset('templete/dist/img/user8-128x128.jpg') }}"
                                alt="User Avatar"
                                class="img-size-50 img-circle ml-3"
                            />
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    پیمان احمدی
                                    <span class="float-left text-sm text-muted"
                                    ><i class="fa fa-star"></i
                                        ></span>
                                </h3>
                                <p class="text-sm">من پیامتو دریافت کردم</p>
                                <p class="text-sm text-muted">
                                    <i class="fa fa-clock-o mr-1"></i> 4 ساعت قبل
                                </p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img
                                src="{{ asset('templete/dist/img/user3-128x128.jpg') }}"
                                alt="User Avatar"
                                class="img-size-50 img-circle ml-3"
                            />
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    سارا وکیلی
                                    <span class="float-left text-sm text-warning"
                                    ><i class="fa fa-star"></i
                                        ></span>
                                </h3>
                                <p class="text-sm">پروژه اتون عالی بود مرسی واقعا</p>
                                <p class="text-sm text-muted">
                                    <i class="fa fa-clock-o mr-1"></i>4 ساعت قبل
                                </p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer"
                    >مشاهده همه پیام‌ها</a
                    >
                </div>
            </li>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell-o"></i>
                    <span class="badge badge-warning navbar-badge">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">
                    <span class="dropdown-item dropdown-header">15 نوتیفیکیشن</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fa fa-envelope ml-2"></i> 4 پیام جدید
                        <span class="float-left text-muted text-sm">3 دقیقه</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fa fa-users ml-2"></i> 8 درخواست دوستی
                        <span class="float-left text-muted text-sm">12 ساعت</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fa fa-file ml-2"></i> 3 گزارش جدید
                        <span class="float-left text-muted text-sm">2 روز</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer"
                    >مشاهده همه نوتیفیکیشن</a
                    >
                </div>
            </li>
            <li class="nav-item">
                <a
                    class="nav-link"
                    data-widget="control-sidebar"
                    data-slide="true"
                    href="#"
                ><i class="fa fa-th-large"></i
                    ></a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('partials.dashboard-sidebar')

    {{ $slot }}

</div>
<!-- /.content-wrapper -->


<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>


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

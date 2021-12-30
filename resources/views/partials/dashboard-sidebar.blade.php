<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
        <img
            src="{{ asset('templete/dist/img/AdminLTELogo.png') }}"
            alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3"
            style="opacity: 0.8"
        />
        <span class="brand-text font-weight-light">پنل مدیریت</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <div>
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img
                        src="https://www.gravatar.com/avatar/52f0fbcbedee04a121cba8dad1174462?s=200&d=mm&r=g"
                        class="img-circle elevation-2"
                        alt="User Image"
                    />
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ auth()->user()->name .' '. auth()->user()->family }}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul
                    class="nav nav-pills nav-sidebar flex-column"
                    data-widget="treeview"
                    role="menu"
                    data-accordion="false"
                >
                    <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                    <li class="nav-item @if(request()->is('dashboard')) menu-open @endif">
                        <a href="{{ route('dashboard') }}" class="nav-link @if(request()->is('dashboard')) active @endif">
                            <i class="nav-icon fa fa-dashboard"></i>
                            <p>
                                داشبورد
                            </p>
                        </a>
                    </li>
                    @can('isAdmin',\App\Models\Course::class)

                        <li class="nav-item has-treeview @if(request()->is('users/*') || request()->is('users')) menu-open @endif">
                            <a href="#" class="nav-link @if(request()->is('users/*') || request()->is('users')) active @endif">
                                <i class="nav-icon fa fa-user"></i>
                                <p>
                                    مدیریت کاربران
                                    <i class="fa fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item @if(request()->is('users')) menu-open @endif">
                                    <a href="{{ route('users.index') }}" class="nav-link @if(request()->is('users')) active @endif">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>لیست کاربران</p>
                                    </a>
                                </li>
                                <li class="nav-item @if(request()->is('users/*')) menu-open @endif">
                                    <a href="{{ route('users.create') }}" class="nav-link @if(request()->is('users/create')) active @endif">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>اضافه کردن کاربر</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endcan
                    <li class="nav-item has-treeview @if(request()->is('courses/*') || request()->is('courses')) menu-open @endif">
                        <a href="#" class="nav-link @if(request()->is('courses/*') || request()->is('courses')) active @endif">
                            <i class="nav-icon fa fa-table"></i>
                            <p>
                                مدیریت دوره ها
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item @if(request()->is('courses')) menu-open @endif">
                                <a href="{{ route('courses.index') }}" class="nav-link @if(request()->is('courses')) active @endif">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>لیست دوره ها</p>
                                </a>
                            </li>
                            @if(auth()->user()->role === 'admin')
                            <li class="nav-item @if(request()->is('courses/create')) menu-open @endif">
                                <a href="{{ route('courses.create') }}" class="nav-link @if(request()->is('courses/create')) active @endif">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>اضافه کردن دوره</p>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </li>

{{--                    <li class="nav-header">مثال‌ها</li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="../calendar.html" class="nav-link">--}}
{{--                            <i class="nav-icon fa fa-calendar"></i>--}}
{{--                            <p>--}}
{{--                                تقویم--}}
{{--                                <span class="badge badge-info right">2</span>--}}
{{--                            </p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item has-treeview">--}}
{{--                        <a href="#" class="nav-link">--}}
{{--                            <i class="nav-icon fa fa-envelope-o"></i>--}}
{{--                            <p>--}}
{{--                                ایمیل‌ باکس--}}
{{--                                <i class="fa fa-angle-left right"></i>--}}
{{--                            </p>--}}
{{--                        </a>--}}
{{--                        <ul class="nav nav-treeview">--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="../mailbox/mailbox.html" class="nav-link">--}}
{{--                                    <i class="fa fa-circle-o nav-icon"></i>--}}
{{--                                    <p>اینباکس</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="../mailbox/compose.html" class="nav-link">--}}
{{--                                    <i class="fa fa-circle-o nav-icon"></i>--}}
{{--                                    <p>ایجاد</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="../mailbox/read-mail.html" class="nav-link">--}}
{{--                                    <i class="fa fa-circle-o nav-icon"></i>--}}
{{--                                    <p>خواندن</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}

                    <li class="nav-header">متفاوت</li>

{{--                    <li class="nav-item">--}}
{{--                        <a href="#" class="nav-link">--}}
{{--                            <i class="nav-icon fa fa-circle-o text-info"></i>--}}
{{--                            <p>اطلاعات</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}

                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="post" id="logout-form">
                            @csrf
                        </form>
                        <a href="" class="nav-link" onclick="event.preventDefault();document.getElementById('logout-form').submit()">
                            <i class="nav-icon fa fa-sign-out"></i>
                            <p>
                                خروج
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </div>
    <!-- /.sidebar -->
</aside>

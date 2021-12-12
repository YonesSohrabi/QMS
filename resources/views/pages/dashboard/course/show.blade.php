<x-dashboard-layout>
    <x-slot name="title">
        جزپیات دوره
    </x-slot>


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">دوره {{ $course->name }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">خانه</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('courses.index') }}">دوره ها</a></li>
                            <li class="breadcrumb-item active">دوره {{ $course->name }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Info boxes -->
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1"><i class="fa fa-gear"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">آزمون های برگزار شده</span>
                                <span class="info-box-number">10</span>
                            </div>

                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-google-plus"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">میانگین نمرات آزمون ها</span>
                                <span class="info-box-number">96.25</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>

                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-users"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">تعداد دانشجویان دوره</span>
                                <span class="info-box-number">{{ count($course->getStudents) }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">توضیحات دوره</h5>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-widget="collapse">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-widget="remove">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                {{ $course->description }}
                            </div>
                            <!-- ./card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <div class="col-md-8">

                        <!-- /.card -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card card-widget widget-user">
                                    <!-- Add the bg color to the header using any of the bg-* classes -->
                                    <div class="widget-user-header bg-info-active">
                                        <h3 class="widget-user-username">@if($teacher){{ $teacher['name'].' '.$teacher['family'] }} @else استاد تعریف نشده @endif</h3>
                                        <h5 class="widget-user-desc">استاد</h5>
                                    </div>
                                    <div class="widget-user-image">
                                        <img class="img-circle elevation-2" src="{{ asset('templete/dist/img/user1-128x128.jpg') }}"
                                             alt="User Avatar">
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-sm-6 border-left">
                                                <div class="description-block">
                                                    <h5 class="description-header">{{ $teacher['coursesCount'] ?? 0}}</h5>
                                                    <span class="description-text">دوره</span>
                                                </div>
                                                <!-- /.description-block -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-6">
                                                <div class="description-block">
                                                    <h5 class="description-header">{{ $teacher['studentCount'] ?? 0}}</h5>
                                                    <span class="description-text">دانشجو</span>
                                                </div>
                                                <!-- /.description-block -->
                                            </div>
                                            <!-- /.col -->

                                        </div>
                                        <!-- /.row -->
                                    </div>
                                </div>
                            </div>
                            <!-- /.col -->

                            <div class="col-md-6">
                                <!-- USERS LIST -->
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">آخرین دانشجویان</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-widget="collapse"><i
                                                    class="fa fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-widget="remove"><i
                                                    class="fa fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body p-0">
                                        <ul class="users-list clearfix">
                                            @foreach($course->getStudents as $user)
                                                <li>
                                                    <img src="{{ asset('templete/dist/img/user1-128x128.jpg')}}" alt="User Image">
                                                    <a class="users-list-name mt-2" href="#">{{ $user->name .' '. $user->family }}</a>
                                                    <span class="users-list-date">{{ $user->pivot->created_at->diffForHumans() }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <!-- /.users-list -->
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer text-center">
                                        <a href="#"> همه دانشجویان این دوره</a>
                                    </div>
                                    <!-- /.card-footer -->
                                </div>
                                <!--/.card -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- TABLE: LATEST ORDERS -->
                        <div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">لیست آزمون ها</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-widget="collapse">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-widget="remove">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table m-0">
                                        <thead>
                                        <tr>
                                            <th>ای دی محصول</th>
                                            <th>محصول</th>
                                            <th>وضعیت</th>
                                            <th>محبوبیت</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><a href="pages/examples/invoice.html">OR9842</a></td>
                                            <td>بازی ندای وظیفه ۱۰</td>
                                            <td><span class="badge badge-success">ارسال شده</span></td>
                                            <td>
                                                <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                    90,80,90,-70,61,-83,63
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href="pages/examples/invoice.html">OR1848</a></td>
                                            <td>تلویزیون هوشمند سامسونگ</td>
                                            <td><span class="badge badge-warning">در حال پردازش</span></td>
                                            <td>
                                                <div class="sparkbar" data-color="#f39c12" data-height="20">
                                                    90,80,-90,70,61,-83,68
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                            <td>آیفون X max</td>
                                            <td><span class="badge badge-danger">تحویل داده شده</span></td>
                                            <td>
                                                <div class="sparkbar" data-color="#f56954" data-height="20">
                                                    90,-80,90,70,-61,83,63
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                            <td>تلویزیون هوشمند سامسونگ</td>
                                            <td><span class="badge badge-info">در انتظار</span></td>
                                            <td>
                                                <div class="sparkbar" data-color="#00c0ef" data-height="20">
                                                    90,80,-90,70,-61,83,63
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href="pages/examples/invoice.html">OR1848</a></td>
                                            <td>تلویزیون هوشمند سامسونگ</td>
                                            <td><span class="badge badge-warning">در حال پردازش</span></td>
                                            <td>
                                                <div class="sparkbar" data-color="#f39c12" data-height="20">
                                                    90,80,-90,70,61,-83,68
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                            <td>آیفون X max</td>
                                            <td><span class="badge badge-danger">تحویل داده شده</span></td>
                                            <td>
                                                <div class="sparkbar" data-color="#f56954" data-height="20">
                                                    90,-80,90,70,-61,83,63
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href="pages/examples/invoice.html">OR9842</a></td>
                                            <td>بازی ندای وظیفه ۱۰</td>
                                            <td><span class="badge badge-success">ارسال شده</span></td>
                                            <td>
                                                <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                    90,80,90,-70,61,-83,63
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">سفارش جدید</a>
                                <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">مشاهده همه
                                    سفار</a>
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->

                    <div class="col-md-4">
                        <!-- Info Boxes Style 2 -->
                        <div class="info-box mb-3 bg-warning">
                            <span class="info-box-icon"><i class="fa fa-plus-circle"></i></span>

                            <div class="info-box-content">
                                <a href="{{ route('courses.studentList',$course->id) }}">
                                <span class="info-box-text">استاد</span>
                                <span class="info-box-number">اضافه کردن یا ویرایش استاد</span>
                                </a>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                        <div class="info-box mb-3 bg-success">
                            <span class="info-box-icon"><i class="fa fa-user"></i></span>

                            <div class="info-box-content">
                                <a href="{{ route('courses.studentList',$course->id) }}">
                                <span class="info-box-text">دانشجویان</span>
                                <span class="info-box-number">اضافه یا حذف کردن دانشجو</span>
                                </a>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                        <div class="info-box mb-3 bg-danger">
                            <span class="info-box-icon"><i class="fa fa-newspaper-o"></i></span>

                            <div class="info-box-content">
                                <a href="">
                                <span class="info-box-text">اطلاعیه</span>
                                <span class="info-box-number">مدیریت اطلاعیه های دوره</span>
                                </a>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->

                        <div class="info-box mb-3 bg-info" onclick="">
                            <span class="info-box-icon">
                                <i class="fa fa-edit"></i>
                            </span>

                            <div class="info-box-content">
                                <a href="">
                                <span class="info-box-text">ویرایش دوره</span>
                                <span class="info-box-number">ویرایش اطلاعات دوره</span>
                                </a>
                            </div>

                            <!-- /.info-box-content -->
                        </div>

                        <div class="card card-primary card-outline direct-chat direct-chat-primary">
                            <div class="card-header">
                                <h3 class="card-title">گفتگو کلاسی</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-toggle="tooltip" title=""
                                            data-widget="chat-pane-toggle" data-original-title="Contacts">
                                        <i class="fa fa-comments"></i></button>
                                    <button type="button" class="btn btn-tool" data-widget="remove"><i
                                            class="fa fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <!-- Conversations are loaded here -->
                                <div class="direct-chat-messages">
                                    <!-- Message. Default to the left -->
                                    <div class="direct-chat-msg">
                                        <div class="direct-chat-info clearfix">
                                            <span class="direct-chat-name float-left">بهزاد محمدی</span>
                                            <span class="direct-chat-timestamp float-right">۲۲ دی ساعت ۱۸</span>
                                        </div>
                                        <!-- /.direct-chat-info -->
                                        <img class="direct-chat-img" src="{{ asset('templete/dist/img/user1-128x128.jpg') }}"
                                             alt="Message User Image">
                                        <!-- /.direct-chat-img -->
                                        <div class="direct-chat-text">
                                            سلام استاد ، میشه میانترم رو عقب بندازین ؟
                                        </div>
                                        <!-- /.direct-chat-text -->
                                    </div>
                                    <!-- /.direct-chat-msg -->

                                    <!-- Message to the right -->
                                    <div class="direct-chat-msg right">
                                        <div class="direct-chat-info clearfix">
                                            <span class="direct-chat-name float-right">سارا لطفی</span>
                                            <span class="direct-chat-timestamp float-left">۲۳ دی ساعت ۱۲</span>
                                        </div>
                                        <!-- /.direct-chat-info -->
                                        <img class="direct-chat-img" src="{{ asset('templete/dist/img/user3-128x128.jpg') }}"
                                             alt="Message User Image">
                                        <!-- /.direct-chat-img -->
                                        <div class="direct-chat-text">
                                            نه آقای محمدی برین بخونین !!
                                        </div>
                                        <!-- /.direct-chat-text -->
                                    </div>
                                    <!-- /.direct-chat-msg -->
                                </div>
                                <!--/.direct-chat-messages-->

                            </div>
                            <!-- /.direct-chat-pane -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <form action="#" method="post">
                                <div class="input-group">
                                    <input type="text" name="message" placeholder="تایپ پیام ..." class="form-control">
                                    <span class="input-group-append">
                                    <button type="submit" class="btn btn-primary">ارسال</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-footer-->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
<!--/. container-fluid -->
    </section>
    <!-- /.content -->
    </div>


    <x-slot name="script">

        <!-- SparkLine -->
        <script src="{{ asset('templete/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
        <!-- jVectorMap -->
        <script src="{{ asset('templete/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
        <script src="{{ asset('templete/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
        <!-- ChartJS 1.0.2 -->
        <script src="{{ asset('templete/plugins/chartjs-old/Chart.min.js') }}"></script>
        <!-- PAGE SCRIPTS -->
        <script src="{{ asset('templete/dist/js/pages/dashboard2.js') }}"></script>

    </x-slot>
</x-dashboard-layout>

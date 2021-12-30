<x-dashboard-layout>
    <x-slot name="title">
        جزپیات دوره
    </x-slot>


    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">دوره {{ $course->name }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">خانه</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('courses.index') }}">دوره ها</a></li>
                            <li class="breadcrumb-item active">دوره {{ $course->name }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="info-box">
                            <span class="info-box-icon bg-success elevation-1"><i class="fa fa-book"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">آزمون های برگزار شده</span>
                                <span class="info-box-number">{{ count($examsHeld) }}</span>
                            </div>

                        </div>

                    </div>

                    @cannot('isStudent',$course)
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-arrows-v"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">میانگین نمرات آزمون ها</span>
                                <span class="info-box-number">96.25</span>
                            </div>

                        </div>

                    </div>
                    @endcannot

                    <div class="clearfix hidden-md-up"></div>

                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-users"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">تعداد دانشجویان دوره</span>
                                <span class="info-box-number">{{ count($course->getStudents) }}</span>
                            </div>

                        </div>

                    </div>

                </div>


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

                            <div class="card-body">
                                {!! $course->description !!}
                            </div>

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-8">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="card card-widget widget-user">

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

                                            </div>

                                            <div class="col-sm-6">
                                                <div class="description-block">
                                                    <h5 class="description-header">{{ $teacher['studentCount'] ?? 0}}</h5>
                                                    <span class="description-text">دانشجو</span>
                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6">

                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">دانشجویان</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-widget="collapse"><i
                                                    class="fa fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-widget="remove"><i
                                                    class="fa fa-times"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="card-body p-0">
                                        <ul class="users-list clearfix">
                                            @foreach($course->getStudents as $user)
                                                <li>
                                                    <img src="{{ asset('templete/dist/img/user1-128x128.jpg')}}" alt="User Image">
                                                    <a class="users-list-name mt-2" href="#">{{ $user->name .' '. $user->family }}</a>
                                                    @cannot('isStudent',$course)
                                                    <span class="users-list-date">{{ $user->pivot->created_at->diffForHumans() }}</span>
                                                    @endcannot
                                                </li>
                                            @endforeach
                                        </ul>

                                    </div>

                                    <div class="card-footer text-center">
                                        <a href="{{ route('courses.studentList',$course->id) }}"> همه دانشجویان این دوره</a>
                                    </div>

                                </div>

                            </div>

                        </div>


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

                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table m-0">
                                        <thead>
                                        <tr>
                                            <th>نام آزمون</th>
                                            <th>تاریخ آزمون</th>
                                            <th>زمان آزمون</th>
                                            <th>وضعیت</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($course->exams as $exam)
                                            <tr>
                                            <td>{{ $exam->title }}</td>
                                            <td>{{ $exam->getStartAt()['date'] }}</td>
                                            <td>{{ $exam->getTimeExam() }} دقیقه</td>
                                            <td><span class="badge @if($exam->getStatus()[0] === 'notStarted') badge-warning
                                                @elseif($exam->getStatus()[0] === 'started') badge-success
                                                @else badge-danger
                                                @endif">
                                                    {{ $exam->getStatus()[1] }}
                                                </span>
                                            </td>
                                            <td>
                                                <a href="{{ route('exams.show', $exam->id )}}">
                                                <button
                                                    type="button"
                                                    class="btn"
                                                    data-toggle="tooltip"
                                                    title="جزئیات آزمون"
                                                    data-widget="chat-pane-toggle"
                                                >
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="card-footer clearfix">
                                <a href="" class="btn btn-sm btn-secondary float-right">مشاهده همه آزمون ها</a>
                            </div>

                        </div>

                    </div>


                    <div class="col-md-4">
                        @cannot('isStudent',$course)
                            @can('isAdmin',\App\Models\Course::class)
                                <div class="info-box mb-3 bg-success">
                                    <span class="info-box-icon"><i class="fa fa-user"></i></span>

                                    <div class="info-box-content">
                                        <a href="{{ route('courses.studentList',$course->id) }}">
                                        <span class="info-box-number">افراد</span>
                                        <span class="info-box-text">اضافه یا حذف کردن افراد به دوره</span>
                                        </a>
                                    </div>

                                </div>
                            @endcan

                            <div class="info-box mb-3 bg-info">
                                    <span class="info-box-icon">
                                        <i class="fa fa-edit"></i>
                                    </span>

                                    <div class="info-box-content">
                                        <a href="{{ route('courses.edit',$course->id) }}">
                                            <span class="info-box-number">ویرایش دوره</span>
                                            <span class="info-box-text">ویرایش اطلاعات دوره</span>
                                        </a>
                                    </div>
                                </div>

                            <div class="info-box mb-3 bg-danger">
                                    <span class="info-box-icon"><i class="fa fa-newspaper-o"></i></span>

                                    <div class="info-box-content">
                                        <a href="">
                                        <span class="info-box-number">اطلاعیه</span>
                                        <span class="info-box-text">مدیریت اطلاعیه های دوره</span>
                                        </a>
                                    </div>

                                </div>

                            @can('isTeacher',$course)
                                <div class="info-box mb-3 bg-warning">
                                        <span class="info-box-icon"><i class="fa fa-question text-xl"></i></span>

                                        <div class="info-box-content">
                                            <a href="{{ route('courses.exams',$course->id) }}">
                                                <span class="info-box-number">مدیریت آزمون</span>
                                                <span class="info-box-text">ویرایش یا حذف آزمون</span>
                                            </a>
                                        </div>

                                    </div>

                                <div class="info-box mb-3 bg-success">
                                        <span class="info-box-icon"><i class="fa fa-plus text-xl"></i></span>

                                        <div class="info-box-content">
                                            <a href="{{ route('courses.createExam',$course->id) }}">

                                                <span class="info-box-number">آزمون جدید</span>
                                                <span class="info-box-text">اضافه کردن آزمون</span>
                                            </a>
                                        </div>

                                    </div>
                            @endcan
                        @endcannot
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

                            <div class="card-body">

                                <div class="direct-chat-messages">

                                    <div class="direct-chat-msg">
                                        <div class="direct-chat-info clearfix">
                                            <span class="direct-chat-name float-left">بهزاد محمدی</span>
                                            <span class="direct-chat-timestamp float-right">۲۲ دی ساعت ۱۸</span>
                                        </div>

                                        <img class="direct-chat-img" src="{{ asset('templete/dist/img/user1-128x128.jpg') }}"
                                             alt="Message User Image">

                                        <div class="direct-chat-text">
                                            سلام استاد ، میشه میانترم رو عقب بندازین ؟
                                        </div>

                                    </div>

                                    <div class="direct-chat-msg right">
                                        <div class="direct-chat-info clearfix">
                                            <span class="direct-chat-name float-right">سارا لطفی</span>
                                            <span class="direct-chat-timestamp float-left">۲۳ دی ساعت ۱۲</span>
                                        </div>

                                        <img class="direct-chat-img" src="{{ asset('templete/dist/img/user3-128x128.jpg') }}"
                                             alt="Message User Image">

                                        <div class="direct-chat-text">
                                            نه آقای محمدی برین بخونین !!
                                        </div>

                                    </div>

                                </div>

                            </div>

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
                        </div>


                    </div>


                </div>

            </div>
        </section>

    </div>


    <x-slot name="script">

        <!-- SparkLine -->
        <script src="{{ asset('templete/plugins/sparkline/jquery.sparkline.min.js') }}"></script>

        <!-- PAGE SCRIPTS -->
        <script src="{{ asset('templete/dist/js/pages/dashboard2.js') }}"></script>

    </x-slot>
</x-dashboard-layout>

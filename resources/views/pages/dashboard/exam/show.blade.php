<x-dashboard-layout>
    <x-slot name="title">
        جزپیات آزمون
    </x-slot>


    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">آزمون {{ $exam->title }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">خانه</a></li>
                            <li class="breadcrumb-item"><a href="">آزمون ها</a></li>
                            <li class="breadcrumb-item active">آزمون {{ $exam->title }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">توضیحات آزمون</h5>

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
                                {!! $exam->description !!}
                            </div>

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-8">
                        @if(auth()->user()->role !== 'student')
                            <div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">لیست شرکت کنندگان</h3>

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
                                            <th>نام دانشجو</th>
                                            <th>تاریخ ثبت پاسخ</th>
                                            <th>عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($studentsInExam as $user)
                                            @if($user['pivot']['user_designer']) @continue @endif
                                            <tr>
                                                <td>{{ $user['name'] . ' ' . $user['family'] }}</td>
                                                <td>
                                                    {{ getCreateAtInJalali($user['pivot']['created_at'])}}
                                                </td>
                                                <td>
                                                    <a href="{{ route('exams.viewQuiz',[$exam->id,'user_id' => $user['id']]) }}">
                                                        <button
                                                            type="button"
                                                            class="btn"
                                                            data-toggle="tooltip"
                                                            title="نمایش جزئیات"
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
                        @endif
                        @if(auth()->user()->role === 'student')
                            <div class="card">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table text-center m-0">
                                        <thead>
                                        <tr>
                                            <th>تعداد دفعات مجاز</th>
                                            <th>تعداد تلاش های شما</th>
                                            <th>عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>{{ $userAttended }}</td>
                                                <td>
                                                    <a href="{{ route('exams.viewQuiz',$exam->id)}}">
                                                        <button type="button" class="btn btn-outline-primary"
                                                        @if($exam->getStatus()[0] !== 'started' || $userAttended) disabled @endif >
                                                            شرکت در آزمون
                                                        </button>
                                                    </a>
                                                </td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @endif

                    </div>

                    <div class="col-md-4">

                        @if(auth()->user()->role === 'student')
                        <div class="info-box">
                            <span class="info-box-icon bg-danger"><i class="fa fa-star-o"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">نمره شما در آزمون</span>
                                <span class="info-box-number">15 از 20</span>
                            </div>
                        </div>
                        @endif

                        <div class="info-box bg-warning-gradient">
                            <span class="info-box-icon"><i class="fa fa-calendar"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text mt-2">وضعیت</span>
                                <span class="info-box-number mb-2 mr-2 @if($exam->getStatus()[0] === 'notStarted') text-secondary
                                        @elseif($exam->getStatus()[0] === 'satrted') text-success
                                        @else text-danger @endif">
                                    {{ $exam->getStatus()[1] }}
                                </span>


                                <span class="info-box-text">شروع آزمون</span>
                                <span class="info-box-number mb-2 mr-2">{{ $exam->getStartAt()['date'].' '.$exam->getStartAt()['time'] }}</span>

                                <span class="info-box-text">پایان آزمون</span>
                                <span class="info-box-number mb-2 mr-2">{{ $exam->getEndAt()['date'].' '.$exam->getEndAt()['time'] }}</span>
                            </div>
                        </div>

                        <div class="info-box bg-primary-gradient">
                            <span class="info-box-icon"><i class="fa fa-info"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text mt-2">نام دوره</span>
                                <span class="info-box-number mb-2 mr-2">{{ $course->name }}</span>
                                <span class="info-box-text">نام استاد</span>
                                <span class="info-box-number mb-2 mr-2">{{ $teacher->name . ' ' . $teacher->family }}</span>
                                <span class="info-box-text">تعداد سوالات آزمون</span>
                                <span class="info-box-number mb-2 mr-2">{{ count($quizzes) }} سوال </span>
                            </div>
                        </div>

                        @if(auth()->user()->role !== 'student')
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">گزارش آزمون</h5>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-widget="collapse">
                                        <i class="fa fa-minus"></i>
                                    </button>

                                    <button type="button" class="btn btn-tool" data-widget="remove">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="card-body" style="display: block;">
                                <div class="row">
                                    <div class="col-md-12">

                                        <p class="text-center">
                                            <strong>گزارش کلی از وضعیت آزمون</strong>
                                        </p>

                                        <div class="progress-group">
                                            تعداد شرکت کنندگان
                                            <span class="float-left"><b>۱۶۰</b>/۲۰۰</span>
                                            <div class="progress progress">
                                                <div class="progress-bar bg-primary-gradient" style="width: 80%"></div>
                                            </div>
                                        </div>

                                        <div class="progress-group">
                                            میانگین نمرات
                                            <span class="float-left"><b>12.5</b>/20</span>
                                            <div class="progress progress-md">
                                                <div class="progress-bar bg-danger-gradient" style="width: 65%"></div>
                                            </div>
                                        </div>



                                    </div>

                                </div>
                            </div>

                        </div>
                        @endif

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

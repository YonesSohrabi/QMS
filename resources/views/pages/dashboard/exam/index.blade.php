<x-dashboard-layout>
    <x-slot name="title">
        داشبورد - مدیریت آزمون ها
    </x-slot>

    <x-slot name="styles">
        <link rel="stylesheet" href="{{ asset('templete/plugins/select2/select2.min.css') }}">
    </x-slot>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> آزمون های دوره {{ $course->name }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">داشبورد</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('courses.index') }}">دوره ها</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('courses.show',$course->id) }}">دوره {{ $course->name }}</a></li>
                            <li class="breadcrumb-item active">آزمون های دوره</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- /.row -->

                <div class="row">

                    <div class="col-md-12">
                        <div class="card card-info card-outline">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <small>جستجو</small>
                                </h3>
                                <!-- tools box -->
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool btn-sm" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                                <!-- /. tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" style="display: block;">
                                <div class="row d-flex justify-content-between">
                                    <div class="col-2 d-flex justify-content-between">
                                        <div>
                                            <a href="{{ route('users.index',['role' => 'teacher']) }}" class="btn btn-block btn-outline-primary">
                                                استاد
                                            </a>
                                        </div>
                                        <div>
                                            <a href="{{ route('users.index',['role' => 'student']) }}" class="btn btn-block btn-outline-info">
                                                دانشجو
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <form action="{{ route('users.index') }}" method="get"  class="form-inline ml-3">
                                            <div class="input-group input-group-sm" style="width: 300px;">
                                                <input type="text" name="search" class="form-control float-right" placeholder="نام کاربر را وارد کنید ... ">

                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col-->
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">لیست آزمون های دوره</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <tr>
                                    <th>آیدی</th>
                                    <th>عنوان آزمون</th>
                                    <th>تاریخ شروع آزمون</th>
                                    <th>ساعت شروع آزمون</th>
                                    <th>وضعیت</th>
                                    <th>عملیات</th>
                                </tr>
                                @foreach($course->exams as $exam)
                                    <tr>
                                        <td>{{ $exam->id }}</td>
                                        <td>{{ $exam->title}}</td>
                                        <td>{{ $exam->getStartAt()['date'] }}</td>
                                        <td>{{ $exam->getStartAt()['time'] }}</td>
                                        <td>
                                            <span class="badge @if($exam->getStatus()[0] === 'notStarted') badge-warning
                                                @elseif($exam->getStatus()[0] === 'started') badge-success
                                                @else badge-danger
                                                @endif">
                                                    {{ $exam->getStatus()[1] }}
                                                </span>
                                        </td>
                                        <td>
                                            @if(auth()->user()->role === 'admin' || auth()->user()->role === 'teacher' )
                                                <a href="{{ route('exams.edit', $exam->id) }}">
                                                    <button
                                                        type="button"
                                                        class="btn text-primary"
                                                        data-toggle="tooltip"
                                                        title="ویرایش آزمون"
                                                        data-widget="chat-pane-toggle"
                                                    >
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                </a>
                                            @endif
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
                                            @if(auth()->user()->role === 'admin' || auth()->user()->role === 'teacher' )
                                            <button
                                                type="button"
                                                class="btn text-danger"
                                                data-toggle="tooltip"
                                                title="حذف آزمون از دوره"
                                                data-widget="chat-pane-toggle"
                                                onclick="$('#delete-exam-{{$exam->id}}').submit()"
                                            >
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            @endif
                                        </td>


{{--                                            <form action="{{ route('users.status', [$user->id,'a']) }}" method="post" id="confirm-user-{{$user->id}}">--}}
{{--                                                @csrf--}}
{{--                                                @method('put')--}}
{{--                                            </form>--}}
                                            <form action="{{ route('courses.deleteExam', [$course->id,$exam->id]) }}" method="post" id="delete-exam-{{$exam->id}}">
                                                @csrf
                                                @method('delete')
                                            </form>

                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </section>
        <!-- /.row -->
    </div>

    <x-slot name="script">

        <!-- Select2 -->
        <script src="{{ asset('templete/plugins/select2/select2.full.min.js') }}"></script>
        <script>
            $(function () {
                //Initialize Select2 Elements
                $('.select2').select2()

            })
        </script>
    </x-slot>
</x-dashboard-layout>

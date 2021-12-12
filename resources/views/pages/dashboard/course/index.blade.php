<x-dashboard-layout>
    <x-slot name="title">
        داشبورد - لیست دوره ها
    </x-slot>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>دوره ها</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="#">خانه</a></li>
                            <li class="breadcrumb-item active">دوره ها</li>
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
                                    <div class="col-7 d-flex justify-content-between">
                                        <div>
                                            <a href="{{ route('courses.index', ['status' => 's']) }}" class="btn btn-block btn-success">
                                                دوره های در حال برگزاری
                                            </a>
                                        </div>
                                        <div>
                                            <a href="{{ route('courses.index', ['status' => 'p']) }}" class="btn btn-block btn-warning">
                                                دوره های شروع نشده
                                            </a>
                                        </div>
                                        <div>
                                            <a href="{{ route('courses.index', ['status' => 'e']) }}" class="btn btn-block btn-danger">
                                                دوره های تموم شده
                                            </a>
                                        </div>

                                    </div>
                                    <div class="col-5">
                                        <form action="{{ route('courses.index') }}" method="get" class="form-inline ml-3">
                                            <div class="input-group input-group-sm" style="width: 300px;">
                                                <input type="text" name="search" class="form-control float-right" placeholder="کدملی کاربر مورد نظر را وارد کنید ... ">

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
                            <h3 class="card-title">لیست دوره ها</h3>
                            <div class="card-tools">
                                    <a href="{{ route('courses.create') }}">
                                        <button type="button" class="btn btn-outline-primary float-right">
                                            <i class="fa fa-plus"></i>
                                            اضافه کردن دوره
                                        </button>
                                    </a>

                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <tr>
                                    <th>آیدی</th>
                                    <th>نام دوره</th>
                                    <th>استاد دوره</th>
                                    <th>تاریخ شروع</th>
                                    <th>تاریخ اتمام</th>
                                    <th>وضعیت</th>
                                    <th>عملیات</th>
                                </tr>
                                @foreach($courses as $course)
                                    <tr>
                                        <td>{{ $course->id }}</td>
                                        <td>{{ $course->name }}</td>
                                        <td>{{ getNameTeacherWithIdCourse($course->id) }}</td>
                                        <td>{{ $course->getStartAtInJalali() }}</td>
                                        <td>{{ $course->getEndAtInJalali() }}</td>
                                        <td>
                                            <span class="badge @if($course->status === 'p') badge-warning
                                                @elseif($course->status === 's') badge-success
                                                @else badge-warning
                                                @endif">{{ $course->getStatus() }}
                                            </span>
                                        </td>
                                        <td>
                                            @if($course->status === 5)
                                                <button
                                                    type="button"
                                                    class="btn text-success"
                                                    data-toggle="tooltip"
                                                    title="تائید"
                                                    data-widget="chat-pane-toggle"
                                                    onclick="$('#confirm-user-{{$course->id}}').submit()"
                                                >
                                                    <i class="fa fa-check"></i>
                                                </button>
                                            @endif
                                            <a href="{{ route('courses.show',$course->id) }}">
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
                                            @if($course->status === 5)
                                                <button
                                                    type="button"
                                                    class="btn text-danger"
                                                    data-toggle="tooltip"
                                                    title="رد"
                                                    data-widget="chat-pane-toggle"
                                                    onclick="$('#reject-user-{{$course->id}}').submit()"
                                                >
                                                    <i class="fa fa-close"></i>
                                                </button>
                                            @endif
                                        </td>
{{--                                        <form action="{{ route('users.status', [$user->id,1]) }}" method="post" id="confirm-user-{{$user->id}}">--}}
{{--                                            @csrf--}}
{{--                                            @method('put')--}}
{{--                                        </form>--}}

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
</x-dashboard-layout>

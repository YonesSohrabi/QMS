<x-dashboard-layout>
    <x-slot name="title">
        داشبورد - مدیریت کاربران
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
                        <h1>کاربران دوره {{ $course->name }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">داشبورد</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('courses.index') }}">دوره ها</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('courses.show',$course->id) }}">دوره {{ $course->name }}</a></li>
                            <li class="breadcrumb-item active">دانشجویان دوره</li>
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
                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title">افزودن کاربر به دوره</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{ route('courses.addUser', $course->id) }}" method="post">
                                    @csrf
                                    <div class="row">
                                    <div class="col-6">
                                            <div class="form-group">
                                                <label>نام کاربر</label>
                                                <select class="form-control select2" name="name[]"  multiple="multiple" data-placeholder="نام کاربر را وارد کنید"
                                                        style="width: 100%;text-align: right;">
                                                    @foreach($users as $user)

                                                        <option value="{{ $user->id }}">
                                                            {{ $user->name .' '. $user->family }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label>نقش <span class="text-danger"> * </span></label>
                                        <select name="role" class="form-control">
                                            <option value="">نقش کاربر را مشخص کنید</option>
                                            <option value="teacher">استاد</option>
                                            <option value="student">دانشجو</option>
                                        </select>
                                    </div>

                                        <button type="submit" class="btn btn-outline-primary float-right col-12">
                                            <i class="fa fa-plus"></i>
                                            اضافه کردن کاربر
                                        </button>

                                </div>
                                </form>
                                <!-- /.row -->
                            </div>
                            <!-- /.card-body -->

                        </div>
                    </div>

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
                            <h3 class="card-title">لیست کاربران دوره</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <tr>
                                    <th>آیدی</th>
                                    <th>نام و نام خانوادگی</th>
                                    <th>تاریخ اضافه شدن به دوره</th>
                                    <th>نقش</th>
                                    <th>عملیات</th>
                                </tr>
                                @foreach($usersIC as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name .' '. $user->family }}</td>
                                        <td>{{ getCreateAtInJalali($user->pivot->create_at) }}</td>
                                        <td>
                                            <!-- a => approved | q => Queue | r => reject -->
                                            <span class="badge @if($user->pivot->role ==='teacher') badge-warning @else badge-primary @endif">@if($user->pivot->role ==='teacher') {{ 'استاد' }} @else {{ 'دانشجو' }} @endif</span>
                                        </td>
                                        <td>

                                            <button
                                                type="button"
                                                class="btn"
                                                data-toggle="tooltip"
                                                title="نمایش جزئیات"
                                                data-widget="chat-pane-toggle"
                                            >
                                                <i class="fa fa-eye"></i>
                                            </button>
                                            <button
                                                type="button"
                                                class="btn text-danger"
                                                data-toggle="tooltip"
                                                title="رد"
                                                data-widget="chat-pane-toggle"
                                                onclick="$('#delete-user-{{$user->id}}').submit()"
                                            >
                                                <i class="fa fa-trash"></i>
                                            </button>

                                        </td>


{{--                                            <form action="{{ route('users.status', [$user->id,'a']) }}" method="post" id="confirm-user-{{$user->id}}">--}}
{{--                                                @csrf--}}
{{--                                                @method('put')--}}
{{--                                            </form>--}}
                                            <form action="{{ route('courses.deleteUser', [ 'user_id' => $user->id , 'id' => $course->id]) }}" method="post" id="delete-user-{{$user->id}}">
                                                @csrf
                                                @method('put')
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

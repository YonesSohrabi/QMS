<x-dashboard-layout>
    <x-slot name="title">
        داشبورد - مدیریت کاربران
    </x-slot>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>کاربران</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="#">خانه</a></li>
                            <li class="breadcrumb-item active">کاربران</li>
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
                                            <a href="{{ route('users.index',['status' => 'a']) }}" class="btn btn-block btn-success">
                                                کاربران تائید شده
                                            </a>
                                        </div>
                                        <div>
                                            <a href="{{ route('users.index',['status' => 'q']) }}" class="btn btn-block btn-warning">
                                                کاربران در انتظار تائید
                                            </a>
                                        </div>
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
                                    <div class="col-5">
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
                            <h3 class="card-title">لیست کاربران</h3>

                            <div class="card-tools">
                                <a href="{{ route('users.create') }}">
                                    <button type="button" class="btn btn-outline-primary float-right">
                                        <i class="fa fa-plus"></i>
                                        اضافه کردن کاربر
                                    </button>
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <tr>
                                    <th>آیدی</th>
                                    <th>نام و نام خانوادگی</th>
                                    <th>کدملی</th>
                                    <th>تاریخ درخواست</th>
                                    <th>ایمیل</th>
                                    <th>نقش</th>
                                    <th>عملیات</th>
                                </tr>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name .' '. $user->family }}</td>
                                    <td>{{ $user->nati_code }}</td>
                                    <td>{{ $user->getCreateAtInJalali() }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <!-- a => approved | q => Queue | r => reject -->
                                        <span class="badge @if($user->status==='a') badge-success @else badge-warning @endif">{{ $user->getRole() }}</span>
                                    </td>
                                    <td>
                                        @if($user->status === 'q')
                                        <button
                                            type="button"
                                            class="btn text-success"
                                            data-toggle="tooltip"
                                            title="تائید"
                                            data-widget="chat-pane-toggle"
                                            onclick="$('#confirm-user-{{$user->id}}').submit()"
                                        >
                                            <i class="fa fa-check"></i>
                                        </button>
                                        @endif
                                        <button
                                            type="button"
                                            class="btn"
                                            data-toggle="tooltip"
                                            title="نمایش جزئیات"
                                            data-widget="chat-pane-toggle"
                                        >
                                            <i class="fa fa-eye"></i>
                                        </button>
                                        @if($user->status === 'q')
                                        <button
                                            type="button"
                                            class="btn text-danger"
                                            data-toggle="tooltip"
                                            title="رد"
                                            data-widget="chat-pane-toggle"
                                            onclick="$('#reject-user-{{$user->id}}').submit()"
                                        >
                                            <i class="fa fa-close"></i>
                                        </button>
                                        @endif
                                        @if($user->status === 'a')
                                            <a href="{{ route('users.edit', $user->id) }}">
                                                <button
                                                    type="button"
                                                    class="btn text-dark"
                                                    data-toggle="tooltip"
                                                    title="ویرایش"
                                                    data-widget="chat-pane-toggle"
                                                >
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </a>
                                        @endif
                                    </td>

                                    @if($user->status === 'q')
                                        <form action="{{ route('users.status', [$user->id,'a']) }}" method="post" id="confirm-user-{{$user->id}}">
                                            @csrf
                                            @method('put')
                                        </form>
                                        <form action="{{ route('users.status', [$user->id,'r']) }}" method="post" id="reject-user-{{$user->id}}">
                                            @csrf
                                            @method('put')
                                        </form>
                                    @endif
                                    @if($user->status === 'a')
                                        <form action="{{ route('users.edit', $user->id) }}" id="edit-user-{{$user->id}}">
                                        </form>
                                    @endif
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

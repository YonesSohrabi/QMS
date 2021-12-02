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
                                            <a href="#" class="btn btn-block btn-success">
                                                کاربران تائید شده
                                            </a>
                                        </div>
                                        <div>
                                            <a href="#" class="btn btn-block btn-warning">
                                                کاربران در انتظار تائید
                                            </a>
                                        </div>
                                        <div>
                                            <a href="#" class="btn btn-block btn-outline-primary">
                                                استاد
                                            </a>
                                        </div>
                                        <div>
                                            <a href="#" class="btn btn-block btn-outline-info">
                                                دانشجو
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <form class="form-inline ml-3">
                                            <div class="input-group input-group-sm" style="width: 300px;">
                                                <input type="text" name="table_search" class="form-control float-right" placeholder="نام کاربر را وارد کنید ... ">

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
                                <tr>
                                    <td>183</td>
                                    <td>یونس سهرابی</td>
                                    <td>4000348795</td>
                                    <td>1400/03/09</td>
                                    <td>y.sohrabi959@gmail.com</td>
                                    <td>
                                        <span class="badge badge-success">استاد</span>
                                    </td>
                                    <td>
                                        <button
                                            type="button"
                                            class="btn text-success"
                                            data-toggle="tooltip"
                                            title="حذف"
                                            data-widget="chat-pane-toggle"
                                        >
                                            <i class="fa fa-check"></i>
                                        </button>
                                        <button
                                            type="button"
                                            class="btn"
                                            data-toggle="tooltip"
                                            title="حذف"
                                            data-widget="chat-pane-toggle"
                                        >
                                            <i class="fa fa-eye"></i>
                                        </button>
                                        <button
                                            type="button"
                                            class="btn text-danger"
                                            data-toggle="tooltip"
                                            title="حذف"
                                            data-widget="chat-pane-toggle"
                                        >
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
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

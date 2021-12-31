<x-dashboard-layout>
    <x-slot name="title">
        ویرایش کاربر
    </x-slot>
    <x-slot name="styles">

        <!-- bootstrap rtl -->
        <link rel="stylesheet" href="{{ asset('templete/dist/css/bootstrap-rtl.min.css') }}">
        <!-- template rtl version -->
        <link rel="stylesheet" href="{{ asset('templete/dist/css/custom-style.css') }}">
    </x-slot>
    <div class="content-wrapper" style="min-height: 511px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>ویرایش کاربر</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="#">خانه</a></li>
                            <li class="breadcrumb-item active">ویرایش کاربر</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title">اطلاعات کاربر</h3>
                            </div>

                            <div class="card-body">
                                @foreach($errors->all() as $er)
                                    <p>{{$er}}</p>
                                @endforeach
                                <form action="{{ route('users.update', $user->id) }}" method="post" role="form">
                                @csrf
                                @method('PUT')

                                    <div class="d-flex">
                                        <div class="form-group col-6">
                                            <label>نام<span class="text-danger"> * </span></label>
                                            <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="نام کاربر مورد نظر را وارد کنید ...">
                                        </div>

                                        <div class="form-group col-6">
                                            <label>نام خانوادگی<span class="text-danger"> * </span></label>
                                            <input type="text" name="family" value="{{ $user->family }}" class="form-control" placeholder="نام خانوادگی کاربر مورد نظر را وارد کنید ...">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>ایمیل <span class="text-danger"> * </span></label>
                                        <input type="text" name="email" value="{{ $user->email }}" class="form-control" placeholder="ایمیل مورد نظر را وارد کنید ...">
                                    </div>

                                    <div class="d-flex">
                                        <div class="form-group col-6">
                                            <label>کد ملی <span class="text-danger"> * </span></label>
                                            <input type="text" name="nati_code" value="{{ $user->nati_code }}" class="form-control" placeholder="کدملی مورد نظر را وارد کنید ...">
                                        </div>

                                        <div class="form-group col-6">
                                            <label>شماره تلفن</label>
                                            <input type="text" name="phone" value="{{ $user->phone }}" class="form-control" placeholder="شماره موبایل کاربر مورد نظر را وارد کنید ...">
                                        </div>
                                    </div>

                                    <div class="d-flex">
                                        <div class="form-group col-6">
                                            <label>رمز عبور</label>
                                            <input type="password" name="password" class="form-control" placeholder="رمز عبور کاربر را وارد کنید ...">
                                        </div>
                                        <div class="form-group col-6">
                                            <label>نقش <span class="text-danger"> * </span></label>
                                            <select name="role" class="form-control">
                                                <option value="">نقش کاربر را مشخص کنید</option>
                                                <option value="admin" @if($user->role === 'admin') selected @endif>ادمین</option>
                                                <option value="teacher" @if($user->role === 'teacher') selected @endif>استاد</option>
                                                <option value="student" @if($user->role === 'student') selected @endif>دانشجو</option>
                                            </select>
                                        </div>
                                    </div>



                                    <button class="btn btn-warning col-12">ویرایش کاربر</button>
                                </form>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </section>

    </div>

    <x-slot name="script">
        <!-- AdminLTE App -->
        <script src="{{ asset('templete/dist/js/adminlte.min.js') }}"></script>

    </x-slot>
</x-dashboard-layout>

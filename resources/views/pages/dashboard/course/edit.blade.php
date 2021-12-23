
<x-dashboard-layout>
    <x-slot name="title">
        ویرایش دوره
    </x-slot>
    <x-slot name="styles">
        <!-- daterange picker -->
        <link rel="stylesheet" href="{{ asset('templete/plugins/daterangepicker/daterangepicker-bs3.css') }}">
        <!-- Bootstrap time Picker -->
        <link rel="stylesheet" href="{{ asset('templete/plugins/timepicker/bootstrap-timepicker.min.css') }}">
        <!-- Persian Data Picker -->
        <link rel="stylesheet" href="{{ asset('templete/dist/css/persian-datepicker.min.css') }}">
        <!-- bootstrap rtl -->
        <link rel="stylesheet" href="{{ asset('templete/dist/css/bootstrap-rtl.min.css') }}">
        <!-- template rtl version -->
        <link rel="stylesheet" href="{{ asset('templete/dist/css/custom-style.css') }}">
    </x-slot>
    <div class="content-wrapper" style="min-height: 511px;">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>ویرایش دوره {{ $course->name }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">خانه</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('courses.index') }}">دوره ها</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('courses.show',$course->id) }}">دوره {{ $course->name }}</a></li>
                            <li class="breadcrumb-item active">ویرایش دوره</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title">ویرایش دوره</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{ route('courses.update' , $course->id) }}" method="post" role="form">
                                @csrf
                                @method('put')
                                <!-- text input -->
                                    <div class="form-group">
                                        <label>نام دوره</label>
                                        <input type="text" name="name" class="form-control" value="{{ $course->name }}" placeholder="نام دوره مورد نظر را وارد کنید ...">
                                    </div>

                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>توضیحات دوره</label>
                                        <textarea class="form-control ck-content" id="editor" name="description"
                                                  placeholder="توضیحات مربوط به دوره را بنویسید ...">
                                            {!! $course->description !!}
                                        </textarea>
                                    </div>


                                    <div class="form-group d-flex">
                                        <label>تاریخ شروع:</label>
                                        <div class="input-group col-5">
                                            <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                        <i class="fa fa-calendar"></i>
                                                      </span>
                                            </div>
                                            <input class="date-start form-control pwt-datepicker-input-element">
                                            <input type="hidden" name="start_at" class="start-at-form">
                                        </div>
                                        <label>تاریخ پایان:</label>
                                        <div class="input-group col-5">
                                            <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                        <i class="fa fa-calendar"></i>
                                                      </span>
                                            </div>
                                            <input class="date-end form-control pwt-datepicker-input-element">
                                            <input type="hidden" name="end_at" class="end-at-form">
                                        </div>
                                    </div>
                                    <button class="btn btn-warning">ثبت دوره</button>
                                </form>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </section>

    </div>

    <x-slot name="script">

        <!-- InputMask -->
        <script src="{{ asset('templete/plugins/input-mask/jquery.inputmask.js') }}"></script>
        <script src="{{ asset('templete/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
        <script src="{{ asset('templete/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
        <!-- date-range-picker -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
        <script src="{{ asset('templete/plugins/daterangepicker/daterangepicker.js') }}"></script>
        <!-- bootstrap color picker -->
        <script src="{{ asset('templete/plugins/colorpicker/bootstrap-colorpicker.min.js') }}"></script>
        <!-- Persian Data Picker -->
        <script src="{{ asset('templete/dist/js/persian-date.min.js') }}"></script>
        <script src="{{ asset('templete/dist/js/persian-datepicker.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('templete/dist/js/adminlte.min.js') }}"></script>
        <script src="{{ asset('templete/plugins/ckeditor/ckeditor.js') }}"></script>


        <script>
            ClassicEditor
                .create( document.querySelector( '#editor' ),{
                    language: 'fa'
                } )
                .catch( error => {
                    console.error( error );
                } );
            $(function () {

                //Datemask dd/mm/yyyy
                $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
                //Datemask2 mm/dd/yyyy
                $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
                //Money Euro
                $('[data-mask]').inputmask()


                $('.date-start').persianDatepicker({
                    altField: '.start-at-form'
                });
                $('.date-end').persianDatepicker({
                    altField: '.end-at-form'
                });

            })
        </script>
    </x-slot>
</x-dashboard-layout>

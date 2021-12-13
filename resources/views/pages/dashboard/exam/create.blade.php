<x-dashboard-layout>
    <x-slot name="title">
        ایجاد آزمون جدید
    </x-slot>
    <x-slot name="styles">
        <!-- daterange picker -->
        <link rel="stylesheet" href="{{ asset('templete/plugins/daterangepicker/daterangepicker-bs3.css') }}">
        <!-- iCheck for checkboxes and radio inputs -->
        <link rel="stylesheet" href="{{ asset('templete/plugins/iCheck/all.css') }}">
        <!-- Bootstrap Color Picker -->
        <link rel="stylesheet" href="{{ asset('templete/plugins/colorpicker/bootstrap-colorpicker.min.css') }}">
        <!-- Bootstrap time Picker -->
        <link rel="stylesheet" href="{{ asset('templete/plugins/timepicker/bootstrap-timepicker.min.css') }}">
        <!-- Persian Data Picker -->
        <link rel="stylesheet" href="{{ asset('templete/dist/css/persian-datepicker.min.css') }}">
        <!-- Select2 -->
        <link rel="stylesheet" href="{{ asset('templete/plugins/select2/select2.min.css') }}">
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
                        <h1>ایجاد آزمون جدید</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="#">خانه</a></li>
                            <li class="breadcrumb-item active">ایجاد آزمون جدید</li>
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
                                <h3 class="card-title">شروع آزمون جدید</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{ route('courses.storeExam',$course->id) }}" method="post" role="form">
                                @csrf
                                <!-- text input -->
                                    <div class="form-group">
                                        <label>نام آزمون</label>
                                        <input type="text" name="title" class="form-control" placeholder="نام آزمون مورد نظر را وارد کنید ...">
                                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                                    </div>

                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>توضیحات آزمون</label>
                                        <textarea class="form-control ck-content" id="editor" name="description"
                                                  placeholder="توضیحات مربوط به آزمون را بنویسید ..."></textarea>
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
                                    <button class="btn btn-warning">ثبت آزمون</button>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
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
                    altField: '.start-at-form',
                    timePicker: {
                        enabled: true,
                        meridiem: {
                            enabled: true
                        }
                    }
                });
                $('.date-end').persianDatepicker({
                    altField: '.end-at-form',
                    timePicker: {
                        enabled: true,
                        meridiem: {
                            enabled: true
                        }
                    }
                });

            })
        </script>
    </x-slot>
</x-dashboard-layout>

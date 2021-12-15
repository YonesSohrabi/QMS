<x-dashboard-layout>
    <x-slot name="title">
        ویرایش آزمون
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
                        <h1>ویرایش آزمون {{ $exam->title }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="#">خانه</a></li>
                            <li class="breadcrumb-item"><a href="#">آزمون ها</a></li>
                            <li class="breadcrumb-item"><a href="#">آزمون {{ $exam->title }}</a></li>
                            <li class="breadcrumb-item active">ویرایش آزمون</li>
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
                                <h3 class="card-title">ویرایش آزمون</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{ route('exams.update',$exam->id) }}" method="post" role="form">
                                @csrf
                                @method('PUT')
                                <!-- text input -->
                                    <div class="form-group">
                                        <label>نام آزمون</label>
                                        <input type="text" name="title" class="form-control" value="{{ $exam->title }}" placeholder="نام آزمون مورد نظر را وارد کنید ...">

                                    </div>

                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>توضیحات آزمون</label>
                                        <textarea class="form-control ck-content" id="editor" name="description"
                                                  placeholder="توضیحات مربوط به آزمون را بنویسید ...">
                                            {!! $exam->description !!}
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
                                    <button class="btn btn-warning">ویرایش آزمون</button>
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

            <div class="row">
                <div class="col-md-7">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-default">
                                    <div class="card-header">
                                        <h3 class="card-title">افزودن سوال از بانک سوالات</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                            <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <form action="" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-10">
                                                    <div class="form-group">
                                                        <label>عنوان سوال</label>
                                                        <select class="form-control select2" name="title[]"  multiple="multiple" data-placeholder=" ...عنوان سوال را وارد کنید"
                                                                style="width: 100%;text-align: right;">
                                                            <option>سلام</option>
                                                            <option>سلام</option>
                                                            <option>سلام</option>
                                                            <option>سلام</option>
                                                            <option>سلام</option>
                                                            <option>سلام</option><option>سلام</option>
                                                            <option>سلام</option>
                                                            <option>سلام</option><option>سلام</option>
                                                            <option>سلام</option>
                                                            <option>سلام</option><option>سلام</option>
                                                            <option>سلام</option>
                                                            <option>سلام</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group col-2">
                                                    <label>نمره <span class="text-danger"> * </span></label>
                                                    <input type="number" class="form-control" name="score" min="0" id="">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-12">
                                                    <button type="submit" class="btn btn-outline-primary float-right col-12">
                                                        <i class="fa fa-plus"></i>
                                                        اضافه کردن سوالات
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- /.row -->
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-dark">
                                    <div class="card-header">
                                        <h3 class="card-title">طراحی سوال جدید</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                            <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <form action="{{ route('exams.update',$exam->id) }}" method="post" role="form" id="quiz_form">
                                        @csrf
                                        @method('PUT')
                                        <!-- text input -->
                                            <div class="form-group">
                                                <label>عنوان سوال</label>
                                                <input type="text" name="title" class="form-control" placeholder="عنوانی کوتاه برای سوال ...">

                                            </div>

                                            <!-- textarea -->
                                            <div class="form-group">
                                                <label>سوال</label>
                                                <textarea class="form-control ck-content" id="editor1" name="quiz_text"
                                                          placeholder="متن یا عکس مربوط به سوال را وارد کنید ...">
                                                </textarea>
                                            </div>

                                            <div id="answer_div">

                                            </div>
                                        </form>
                                        <div class="d-flex justify-content-between">
                                            <button class="btn btn-outline-primary" id="add_button"><i class="fa fa-plus"></i> افزودن گزینه</button>
                                            <button class="btn btn-dark" id="add_quiz_button">افزودن سوال</button>
                                        </div>

                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fa fa-archive mr-1"></i>
                                سوالات اضافه شده به آزمون
                            </h3>

                            <div class="card-tools">
                                <ul class="pagination pagination-sm">
                                    <li class="page-item"><a href="#" class="page-link">«</a></li>
                                    <li class="page-item"><a href="#" class="page-link">۱</a></li>
                                    <li class="page-item"><a href="#" class="page-link">۲</a></li>
                                    <li class="page-item"><a href="#" class="page-link">۳</a></li>
                                    <li class="page-item"><a href="#" class="page-link">»</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <ul class="todo-list">
                                <li>
                                    <!-- drag handle -->
                                    <span class="mr-1">
                                        <i class="fa fa-ellipsis-v"></i>
                                        <i class="fa fa-ellipsis-v"></i>
                                    </span>
                                    <!-- checkbox -->
                                    <input type="checkbox" value="" name="">
                                    <!-- todo text -->
                                    <span class="text">فیثاغورس</span>
                                    <!-- Emphasis label -->
                                    <small class="badge badge-danger"> 2 از 10</small>
                                    <small class="badge badge-success">4 گزینه ای</small>
                                    <!-- General tools such as edit or delete-->
                                    <div class="tools">
                                        <i class="fa fa-edit"></i>
                                        <i class="fa fa-trash-o"></i>
                                    </div>
                                </li>
                                <li>
                                    <!-- drag handle -->
                                    <span class="mr-1">
                                        <i class="fa fa-ellipsis-v"></i>
                                        <i class="fa fa-ellipsis-v"></i>
                                    </span>
                                    <!-- checkbox -->
                                    <input type="checkbox" value="" name="">
                                    <!-- todo text -->
                                    <span class="text">فیثاغورس</span>
                                    <!-- Emphasis label -->
                                    <small class="badge badge-danger"> 2 از 10</small>
                                    <!-- General tools such as edit or delete-->
                                    <div class="tools">
                                        <i class="fa fa-edit"></i>
                                        <i class="fa fa-trash-o"></i>
                                    </div>
                                </li>
                                <li>
                                    <!-- drag handle -->
                                    <span class="mr-1">
                                        <i class="fa fa-ellipsis-v"></i>
                                        <i class="fa fa-ellipsis-v"></i>
                                    </span>
                                    <!-- checkbox -->
                                    <input type="checkbox" value="" name="">
                                    <!-- todo text -->
                                    <span class="text">فیثاغورس</span>
                                    <!-- Emphasis label -->
                                    <small class="badge badge-danger"> 2 از 10</small>
                                    <!-- General tools such as edit or delete-->
                                    <div class="tools">
                                        <i class="fa fa-edit"></i>
                                        <i class="fa fa-trash-o"></i>
                                    </div>
                                </li>
                                <li>
                                    <!-- drag handle -->
                                    <span class="mr-1">
                                        <i class="fa fa-ellipsis-v"></i>
                                        <i class="fa fa-ellipsis-v"></i>
                                    </span>
                                    <!-- checkbox -->
                                    <input type="checkbox" value="" name="">
                                    <!-- todo text -->
                                    <span class="text">فیثاغورس</span>
                                    <!-- Emphasis label -->
                                    <small class="badge badge-danger"> 2 از 10</small>
                                    <!-- General tools such as edit or delete-->
                                    <div class="tools">
                                        <i class="fa fa-edit"></i>
                                        <i class="fa fa-trash-o"></i>
                                    </div>
                                </li>
                                <li>
                                    <!-- drag handle -->
                                    <span class="mr-1">
                                        <i class="fa fa-ellipsis-v"></i>
                                        <i class="fa fa-ellipsis-v"></i>
                                    </span>
                                    <!-- checkbox -->
                                    <input type="checkbox" value="" name="">
                                    <!-- todo text -->
                                    <span class="text">فیثاغورس</span>
                                    <!-- Emphasis label -->
                                    <small class="badge badge-danger"> 2 از 10</small>
                                    <!-- General tools such as edit or delete-->
                                    <div class="tools">
                                        <i class="fa fa-edit"></i>
                                        <i class="fa fa-trash-o"></i>
                                    </div>
                                </li>

                            </ul>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <button type="button" class="btn btn-info float-right"><i class="fa fa-plus"></i> جدید</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
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
        <script src="{{ asset('templete/plugins/ckeditor/inline.js') }}"></script>
        <script src="{{ asset('templete/plugins/select2/select2.full.min.js') }}"></script>

        <script>
            $(function () {

                //Initialize Select2 Elements
                $('.select2').select2()
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

                var x = 0; //initlal text box count

                $('#add_button').click(function(e){ //on add input button click
                    e.preventDefault();
                    x++; //text box increment
                    $('#answer_div').append(
                        '<div class="form-group">'+
                        '<label class="text-info"> گزینه '+x+'</label>'+
                        '<textarea class="form-control ck-content" name="quiz_answer_text[]"'+
                        ' placeholder="متن مربوط به گزینه سوال را وارد کنید ...">'+
                        '</textarea>'+
                        '</div>'
                    );
                });

                $('#add_quiz_button').click(function(e){
                    e.preventDefault();
                    $('#quiz_form').submit();
                });

                // $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                //     e.preventDefault(); $(this).parent('div').remove(); x--;
                // });


            })
            ClassicEditor
                .create( document.querySelector( '#editor' ),{
                    language: 'fa'
                } )
                .catch( error => {
                    console.error( error );
                } );
            ClassicEditor
                .create( document.querySelector( '#editor1' ),{
                    language: 'fa'
                } )
                .catch( error => {
                    console.error( error );
                } );




        </script>


    </x-slot>
</x-dashboard-layout>

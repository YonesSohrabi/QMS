<x-dashboard-layout>
    <x-slot name="title">
        ویرایش آزمونphp
    </x-slot>
    <x-slot name="styles">
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
                                        <form action="{{ route('exams.addQuiz',[$exam->id,'type' => 'bank']) }}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-10">
                                                    <div class="form-group">
                                                        <label>عنوان سوال</label>
                                                        <select class="form-control select2" name="title[]"  multiple="multiple" data-placeholder=" ...عنوان سوال را وارد کنید"
                                                                style="width: 100%;text-align: right;">
                                                            @foreach($teacherQuizzes as $quiz)
                                                                <option value="{{$quiz->id}}">{{ $quiz->quiz_title }}</option>
                                                            @endforeach
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
                                        <form action="{{ route('exams.addQuiz',[$exam->id,'type' => 'new']) }}" method="post" role="form" id="quiz_form">
                                        @csrf
                                        <!-- text input -->
                                            <div class="row">
                                                <div class="form-group col-10">
                                                    <label>عنوان سوال</label>
                                                    <input type="text" name="quiz_title" class="form-control" placeholder="عنوانی کوتاه برای سوال ...">
                                                </div>

                                                <div class="form-group col-2">
                                                    <label>نمره <span class="text-danger"> * </span></label>
                                                    <input type="number" class="form-control" name="score" min="0">
                                                </div>
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
                    @if($quizzesExam->isEmpty())
                        <div class="alert alert-primary alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fa fa-warning"></i> توجه!</h5>
                            فعلا هیچ سوالی به این آزمون اضافه نشده است .<br>
                            شما می توانید همین الان از بخش کناری ، به دو صورت افزودن سوال از بانک یا تعریف سوال جدید برای اضافه کردن سوال به این آزمون استفاده کنید .
                        </div>
                    @else
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fa fa-archive mr-1"></i>
                                سوالات اضافه شده به آزمون
                            </h3>

                        </div>
                        <div class="card-body">
                            <ul class="todo-list">
                                @foreach($quizzesExam as $quiz)
                                    <li>
                                        <!-- drag handle -->
                                        <span class="mr-1">
                                            <i class="fa fa-ellipsis-v"></i>
                                            <i class="fa fa-ellipsis-v"></i>
                                        </span>

                                        <!-- todo text -->
                                        <span class="text">{{ $quiz->quiz_title }}</span>
                                        <!-- Emphasis label -->
                                        <small class="badge badge-danger">{{ $quiz->pivot->score }} از {{ $quiz->pivot->sum('score') }}</small>
                                        <small class="badge badge-success">
                                            @if($quiz->type === 'solid') تشریحی @else چند گزینه ای @endif
                                        </small>
                                        <!-- General tools such as edit or delete-->
                                        <div class="tools">
                                            <i class="fa fa-edit"></i>
                                            <i class="fa fa-trash-o"></i>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                        <div class="card-footer clearfix">
                            <button type="button" class="btn btn-info float-right"><i class="fa fa-plus"></i> جدید</button>
                        </div>

                    </div>
                    @endif
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

        <!-- Persian Data Picker -->
        <script src="{{ asset('templete/dist/js/persian-date.min.js') }}"></script>
        <script src="{{ asset('templete/dist/js/persian-datepicker.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('templete/dist/js/adminlte.min.js') }}"></script>
        <script src="{{ asset('templete/plugins/ckeditor/ckeditor.js') }}"></script>
        <script src="{{ asset('templete/plugins/select2/select2.full.min.js') }}"></script>

        <script>
            var x = 0;
            function deleteOption(e){
                e.parentElement.parentElement.parentElement.remove();
                x--;
            }
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



                $('#add_button').click(function(e){ //on add input button click
                    e.preventDefault();
                    x++; //text box increment
                    $('#answer_div').append(
                        '<div class="form-group">'+
                        '<div class="d-flex justify-content-between">' +
                        '<label class="text-info"> گزینه '+x+'</label>'+
                        '<div>'+
                        '<input type="checkbox" value="'+(x-1)+'" name="quiz_answer[isCorrect][]">'+
                        '<button type="button" class="btn bg-transparent text-danger" onclick="deleteOption(this)"><i class="fa fa-trash"></i></button>' +
                        '</div></div>'+
                        '<textarea class="form-control ck-content" name="quiz_answer[text][]"'+
                        ' placeholder="متن مربوط به گزینه سوال را وارد کنید ...">'+
                        '</textarea>'+
                        '</div>'
                    );
                });

                $('#add_quiz_button').click(function(e){
                    e.preventDefault();
                    $('#quiz_form').submit();
                });


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

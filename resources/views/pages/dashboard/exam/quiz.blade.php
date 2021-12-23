<x-dashboard-layout>
    <x-slot name="title">
        جزپیات آزمون
    </x-slot>


    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">آزمون {{ $exam->title }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">خانه</a></li>
                            <li class="breadcrumb-item"><a href="">آزمون ها</a></li>
                            <li class="breadcrumb-item active">آزمون {{ $exam->title }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">

                <div class="row">

                    <div class="col-md-8">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">سوال 1</h5>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-sm">
                                                قبلی
                                            </button>
                                            <button type="button" class="btn btn-sm">
                                                بعدی
                                            </button>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        به نظر شما اولین فرمول انتگرال کجا و به چه علت به کار برده شد ؟!
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card ">
                                    <div class="card-header">
                                        <h5 class="card-title">پاسخ</h5>

                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('exams.addQuiz',[$exam->id,'type' => 'new']) }}" method="post" role="form">
                                        @csrf
                                            <div class="form-group">
                                                <textarea class="form-control ck-content" id="answer-box" name="quiz_text"
                                                          placeholder="متن یا عکس پاسخ خود را وارد کنید ...">
                                                </textarea>
                                            </div>

                                            <button class="btn btn-dark">ارسال پاسخ</button>

                                        </form>


                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card ">
                                    <div class="card-header">
                                        <h5 class="card-title">پاسخ</h5>

                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('exams.addQuiz',[$exam->id,'type' => 'new']) }}" method="post" role="form" id="answer_form">
                                            @csrf
                                            <div class="form-group p-2">
                                                <label class="text-info"> گزینه 1</label>
                                                <input type="checkbox" value="" name="quiz_answer">
                                                <span>سلام دوستان وقت بخیر</span>
                                            </div>

                                            <button class="btn btn-dark">ارسال پاسخ</button>

                                        </form>


                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="info-box">
                            <div class="info-box-content mt-3">
                                <span class="mr-2">زمان باقی مانده</span>
                                <span class="mr-5">25 : 30</span>
                            </div>
                        </div>


                    </div>

                </div>
        </section>

    </div>


    <x-slot name="script">

        <!-- SparkLine -->
        <script src="{{ asset('templete/plugins/sparkline/jquery.sparkline.min.js') }}"></script>

        <!-- PAGE SCRIPTS -->
        <script src="{{ asset('templete/dist/js/pages/dashboard2.js') }}"></script>

        <script src="{{ asset('templete/plugins/ckeditor/ckeditor.js') }}"></script>

        <script>

            ClassicEditor
                .create( document.querySelector( '#answer-box' ),{
                    language: 'fa'
                } )
                .catch( error => {
                    console.error( error );
                } );





        </script>

    </x-slot>


</x-dashboard-layout>

{{--{{ dd($quizzes) }}--}}
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
                        @foreach($quizzes as $quiz)
{{--                            {{ dd($quiz->toArray()['answers']) }}--}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">سوال {{ $quizzes->currentPage() }}</h5>

                                        <div class="card-tools">
                                            {{ $quizzes->links('vendor.pagination.quiz') }}
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        {!! $quiz->quiz_text !!}
                                    </div>

                                </div>
                            </div>
                        </div>

                        @if($quiz->type === 'solid')
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
                        @endif

                        @if($quiz->type === 'mulitple')
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

                                                <div class="col-md-12">
                                                    @foreach($quiz->toArray()['answers'] as $key => $answer)
                                                        <div class="info-box bg-info">
                                                            <input type="checkbox" class="mt-4 mx-3" value="" name="quiz_answer">
                                                            <span class="info-box-icon text-sm bg-danger ml-3 px-1">گزینه {{ ++$key }}</span>
                                                            <p class="mt-3">{{ $answer['answer_text'] }}</p>
                                                        </div>
                                                    @endforeach


                                                </div>

                                            </div>

                                            <button class="btn btn-dark">ارسال پاسخ</button>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @endforeach
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

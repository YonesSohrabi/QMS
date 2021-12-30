{{--{{ dd($quizzes->links()) }}--}}
<x-dashboard-layout>
    <x-slot name="title">
        جزییات آزمون
    </x-slot>

    <x-slot name="styles">
        @livewireStyles
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
                            <li class="breadcrumb-item"><a href="{{ route('exams.show',$exam->id) }}">آزمون ها</a></li>
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
                                            <input type="hidden" id="end_at" value="{{ $exam->end_at }}">
                                        </div>

                                    </div>
                                </div>
                            </div>

                            @livewire('quiz-answer',[
                                'quiz' => $quiz,
                                'exam' => $exam,
                            ])


                        @endforeach
                    </div>

                    <div class="col-md-4">

                        <div class="info-box">
                            <div class="info-box-content mt-3">
                                <span class="mr-2">زمان باقی مانده</span>
                                <span class="mr-3 text-danger" id="timer"></span>
                            </div>
                        </div>



                    </div>

                </div>
            </div>
        </section>
        <form action="{{ route('exams.sendQuiz',$exam->id) }}" id="form-quiz" method="post">
            @csrf
        </form>

    </div>

    @livewireScripts

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
            const end_at = new Date(document.getElementById('end_at').value);

            setInterval(function(){
                let diff = end_at - new Date();
                var hh = Math.floor(diff / 1000 / 60 / 60);
                diff -= hh * 1000 * 60 * 60;
                var mm = Math.floor(diff / 1000 / 60);
                diff -= mm * 1000 * 60;
                var ss = Math.floor(diff / 1000);
                mm += (hh*60);
                let timer = mm < 0
                    ? 'زمان آزمون به پایان رسیده'
                    : mm+' دقیقه '+ss+' ثانیه';
                document.getElementById("timer").innerHTML = timer;
            }, 1000);

            $('#sendQuiz').click(function (){
                $('#form-quiz').submit()
            })




        </script>

    </x-slot>


</x-dashboard-layout>

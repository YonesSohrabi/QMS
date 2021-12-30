<div>
    @if($quiz->type === 'solid')
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header">
                        <h5 class="card-title">پاسخ</h5>

                    </div>
                    <div class="card-body">

                            <div class="form-group">
                                <textarea class="form-control ck-content" name="quiz_text"
                                          placeholder="متن یا عکس پاسخ خود را وارد کنید ..." wire:model="quiz_answer">
                                </textarea>
                            </div>


                        <button wire:click="saveToSession({{$quiz->id}})" class="btn btn-dark">ذخیره پاسخ</button>


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

                            <div class="form-group p-2">

                                <div class="col-md-12">
                                    @foreach($quiz->toArray()['answers'] as $key => $answer)
                                        <div class="info-box bg-info">
                                            <input type="checkbox" class="mt-4 mx-3" wire:model="quiz_answer" value="{{ ++$key }}" name="quiz_answer">
                                            <span class="info-box-icon text-sm bg-danger ml-3 px-1">گزینه {{ $key }}</span>
                                            <p class="mt-3">{{ $answer['answer_text'] }}</p>
                                        </div>

                                    @endforeach

                                    <button wire:click="saveToSession({{$quiz->id}})" class="btn btn-dark">ذخیره پاسخ</button>
                                </div>

                            </div>


                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(auth()->user()->role !== 'student')
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">نمره دهی به این سوال</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="" method="post">
                                @csrf

                                <div class="form-group">
                                    <label>نمره <span class="text-danger"> * </span></label>
                                    <input type="number" class="form-control" name="score" min="0"
                                           max="">
                                </div>

                                <button type="submit" class="btn btn-outline-primary float-right col-12">
                                    <i class="fa fa-plus"></i>
                                    ثبت نمره
                                </button>
                            </form>
                        </div>

                        <!-- /.row -->
                    </div>
                </div>
            </div>
        @endif
</div>

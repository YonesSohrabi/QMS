@if ($paginator->hasPages())

        @if ($paginator->onFirstPage())
            <button type="button" class="btn btn-sm" disabled>
                قبلی
            </button>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev">
                <button type="button" class="btn btn-sm btn-primary">
                    قبلی
                </button>
            </a>
        @endif


        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next">
                <button type="button" id="btnbtnbtn" class="btn btn-sm btn-primary">بعدی</button>
            </a>
        @else

            <button type="button" id="sendQuiz" class="btn btn-sm">ارسال آزمون</button>

        @endif

@endif

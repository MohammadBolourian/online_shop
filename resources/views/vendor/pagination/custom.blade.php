
{{--@if ($paginator->hasPages())--}}
{{--    <div class="col ">--}}
{{--        <ul class = "pagination float-left">--}}

{{--        @if ($paginator->onFirstPage())--}}
{{--                <li class = "page-item disabled">  <<  </li>--}}
{{--                <li class = "page-item disabled"> <a class="page-link" rel="prev" href=""> << </a> </li>--}}
{{--        @else--}}
{{--                <li class = "page-item"> <a class="page-link" rel="prev" href="{{ $paginator->previousPageUrl() }}"> << </a> </li>--}}
{{--            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">← Previous</a></li>--}}
{{--        @endif--}}



{{--        @foreach ($elements as $element)--}}

{{--            @if (is_string($element))--}}
{{--                <li class="disabled"><span>{{ $element }}</span></li>--}}
{{--                    <li class = "page-item disabled"> <span class="page-link">{{ $element }}</span> </li>--}}
{{--            @endif--}}



{{--            @if (is_array($element))--}}
{{--                @foreach ($element as $page => $url)--}}
{{--                    @if ($page == $paginator->currentPage())--}}
{{--                        <li class="active my-active"><span>{{ $page }}</span></li>--}}
{{--                            <li class = "page-item active"> <span class="page-link" > {{ $page }} </span> </li>--}}
{{--                    @else--}}
{{--                        <li><a href="{{ $url }}">{{ $page }}</a></li>--}}
{{--                            <li class = "page-item"> <a class="page-link" href="{{ $url }}"> {{ $page }} </a> </li>--}}
{{--                    @endif--}}
{{--                @endforeach--}}
{{--            @endif--}}
{{--        @endforeach--}}



{{--        @if ($paginator->hasMorePages())--}}
{{--            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">Next →</a></li>--}}
{{--                <li class = "page-item"> <a class="page-link" rel="next" href="{{ $paginator->nextPageUrl() }}"> >> </a> </li>--}}
{{--        @else--}}
{{--            <li class="disabled"><span>Next →</span></li>--}}
{{--                <li class = "page-item disabled"> <a class="page-link" rel="prev" href=""> >> </a> </li>--}}

{{--        @endif--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--@endif--}}


@if ($paginator->hasPages())

    <div class="col ">
        <ul class = "pagination float-left">

        @if ($paginator->onFirstPage())

                <li class = "page-item disabled"> <a class="page-link" rel="prev" href=""> << </a> </li>
        @else

                <li class = "page-item"> <a class="page-link" rel="prev" href="{{ $paginator->previousPageUrl() }}"> << </a> </li>
        @endif

        @if($paginator->currentPage() > 2)
            <li class="hidden-xs page-item"><a class="page-link" href="{{ $paginator->url(1) }}">1</a></li>

        @endif
        @if($paginator->currentPage() > 3)
                <li class = "page-item disabled"> <a class="page-link"> ... </a> </li>
        @endif
        @foreach(range(1, $paginator->lastPage()) as $i)


{{--            tedad safahat chap va rast az inja taghir mikonad--}}


            @if($i >= $paginator->currentPage() - 1 && $i <= $paginator->currentPage() + 1)
                @if ($i == $paginator->currentPage())
                        <li class = "page-item active"> <span class="page-link" > {{ $i }} </span> </li>
                @else
                        <li class = "page-item"> <a class="page-link" href="{{ $paginator->url($i) }}"> {{ $i }} </a> </li>
                @endif
            @endif
        @endforeach
        @if($paginator->currentPage() < $paginator->lastPage() - 2)
                <li class = "page-item disabled"> <a class="page-link"> ... </a> </li>
        @endif
        @if($paginator->currentPage() < $paginator->lastPage() - 1)
            <li class="hidden-xs page-item"><a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a></li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
                <li class = "page-item"> <a class="page-link" rel="next" href="{{ $paginator->nextPageUrl() }}"> >> </a> </li>
        @else
                <li class = "page-item disabled"> <a class="page-link" rel="prev" href=""> >> </a> </li>
        @endif
        </ul>
    </div>
@endif

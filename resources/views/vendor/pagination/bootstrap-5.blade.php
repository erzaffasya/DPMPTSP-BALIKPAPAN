@if ($paginator->hasPages())
    <div class="pagination-wrapper pagination-wrapper-left">
        <ul class="pg-pagination">
            @if ($paginator->onFirstPage())
                {{-- <li>
                    <a href="#" aria-label="Previous">
                        <i class="fi ti-angle-left"></i>
                    </a>
                </li> --}}
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" aria-label="Previous">
                        <i class="fi ti-angle-left"></i>
                    </a>
                </li>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                @endif
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active"><a href="#">{{ $page }}</a></li>
                            {{-- <li class="page-item active" aria-current="page"><span
                                    class="page-link">{{ $page }}</span></li> --}}
                        @else
                            {{-- <li class="page-item"><a class="page-link"
                                    href="{{ $url }}">{{ $page }}</a></li> --}}
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                {{-- <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"
                        aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li> --}}
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="Next">
                        <i class="fi ti-angle-right"></i>
                    </a>
                </li>
            @else
                {{-- <li>
                    <a href="#" aria-label="Next">
                        <i class="fi ti-angle-right"></i>
                    </a>
                </li> --}}
            @endif

            {{-- <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li> --}}

        </ul>
    </div>
@endif

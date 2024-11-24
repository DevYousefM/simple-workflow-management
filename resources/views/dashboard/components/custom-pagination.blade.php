<nav class="dm-page ">
    <ul class="dm-pagination d-flex">
        @if ($paginator->onFirstPage())
            <li class="dm-pagination__item disabled">
                <a href="#" class="dm-pagination__link pagination-control"><span class="la la-angle-left"></span></a>
            </li>
        @else
            <li class="dm-pagination__item">
                <a href="{{ $paginator->previousPageUrl() }}" class="dm-pagination__link pagination-control"><span
                        class="la la-angle-left"></span></a>
            </li>
        @endif

        @foreach ($elements[0] as $page => $url)
            @if ($page == $paginator->currentPage())
                <li class="dm-pagination__item">
                    <a href="#" class="dm-pagination__link active"><span
                            class="page-number">{{ $page }}</span></a>
                </li>
            @else
                <li class="dm-pagination__item">
                    <a href="{{ $url }}" class="dm-pagination__link"><span
                            class="page-number">{{ $page }}</span></a>
                </li>
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <li class="dm-pagination__item">
                <a href="{{ $paginator->nextPageUrl() }}" class="dm-pagination__link pagination-control"><span
                        class="la la-angle-right"></span></a>
            </li>
        @else
            <li class="dm-pagination__item disabled">
                <a href="#" class="dm-pagination__link pagination-control"><span
                        class="la la-angle-right"></span></a>
            </li>
        @endif
    </ul>
</nav>

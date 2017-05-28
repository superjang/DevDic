@if ($paginator->hasPages())
    <ul class="dictionary__pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled"><span class="dictionary__pagination_btn_text">Previous</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="dictionary__pagination_btn_text">Previous</a></li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next" class="dictionary__pagination_btn_text">Next</a></li>
        @else
            <li class="disabled"><span class="dictionary__pagination_btn_text">Next</span></li>
        @endif
    </ul>
@endif

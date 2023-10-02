@if ($paginator->hasPages())
<ul class="pagination">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <li class="page-item disabled" style="font-size: 0.9em;">
            <a href="#" rel="prev" aria-label="@lang('pagination.previous')" role="button" disabled aria-disabled="true">
                <i class="icon icon-arrow-left"></i>
            </a>
        </li>
    @else
        <li class="page-item" style="font-size: 0.9em;">
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')" role="button">
                <i class="icon icon-arrow-left"></i>
            </a>
        </li>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
            <li class="page-item">
                <span>{{ $element }}</span>
            </li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="page-item active">
                        <a href="#" aria-current="page" role="button" disabled aria-disabled="true">{{ $page }}</a>
                    </li>
                @else
                    <li class="page-item">
                        <a href="{{ $url }}" role="button">{{ $page }}</a>
                    </li>
                @endif
            @endforeach
        @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <li class="page-item">
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')" role="button">
                <i class="icon icon-arrow-right"></i>
            </a>
        </li>
    @else
        <li class="page-item disabled">
            <a href="#" rel="next" aria-label="@lang('pagination.next')" role="button" disabled aria-disabled="true">
                <i class="icon icon-arrow-right"></i>
            </a>
        </li>
    @endif
</ul>
@endif

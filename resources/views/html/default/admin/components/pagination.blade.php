@if ($paginator->hasPages())
    <nav class="d-flex justify-content-center align-items-center mb-3">
        <ul style="--nav-element-spacing-horizontal: 0.1rem;">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li>
                    <a href="javascript:void(0)" rel="prev" aria-label="@lang('pagination.previous')" role="button" disabled aria-disabled="true">&lsaquo;</a>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')" role="button">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li>
                        <a href="javascript:void(0)" role="button" disabled aria-disabled="true">{{ $element }}</a>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li>
                                <a href="javascript:void(0)" class="active" aria-current="page" role="button" disabled aria-disabled="true">{{ $page }}</a>
                            </li>
                        @else
                            <li><a href="{{ $url }}" role="button">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')" role="button">&rsaquo;</a>
                </li>
            @else
                <li>
                    <a href="javascript:void(0)" rel="prev" aria-label="@lang('pagination.next')" role="button" disabled aria-disabled="true">&rsaquo;</a>
                </li>
            @endif
        </ul>
        <details role="list" style="font-size: inherit;" class="mb-0 ml-2">
            <summary aria-haspopup="listbox" role="button" class="align-items-center">
                20 шт. на странице
            </summary>
            <ul role="listbox">
                <li><a href="{{ route('admin.users.index') }}">20</a></li>
                <li><a href="{{ route('admin.users.index') }}">50</a></li>
                <li><a href="{{ route('admin.users.index') }}">100</a></li>
                <li><a href="{{ route('admin.users.index') }}">200</a></li>
                <li><a href="{{ route('admin.users.index') }}">500</a></li>
                <li><a href="{{ route('admin.users.index') }}">1000</a></li>
            </ul>
        </details>
    </nav>
@endif

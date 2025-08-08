@if ($paginator->hasPages())
    <div class="pagination -arrows">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <button class="pagination__button button -prev disabled" disabled>
                <i class="icon icon-arrow-left text-9"></i>
            </button>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="pagination__button button -prev">
                <i class="icon icon-arrow-left text-9"></i>
            </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <div class="pagination__count">{{ $element }}</div>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <div class="pagination__count is-active">{{ $page }}</div>
                    @else
                        <a href="{{ $url }}" class="pagination__count">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="pagination__button button -next">
                <i class="icon icon-arrow-right text-9"></i>
            </a>
        @else
            <button class="pagination__button button -next disabled" disabled>
                <i class="icon icon-arrow-right text-9"></i>
            </button>
        @endif
    </div>
@endif


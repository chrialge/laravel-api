@if ($paginator->hasPages())
    <nav class="d-flex justify-items-center justify-content-between">
        <div class="d-flex justify-content-between flex-fill d-sm-none">
            <ul class="pagination">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                @else
                    <li class="page_arrow page_mobile">
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev">
                            <span>Precedente</span>
                            <i class="ri-arrow-left-s-line"></i>

                        </a>
                    </li>
                @endif

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page_arrow page_mobile">
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next">
                            <span>Prossimo</span>
                            <i class="ri-arrow-right-s-line"></i>
                        </a>
                    </li>
                @else
                @endif
            </ul>
        </div>

        <div class="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">
            <div>
                <p class="small text-muted">
                    {!! __('Dal') !!}
                    <span class="fw-semibold">{{ $paginator->firstItem() }}</span>
                    {!! __('al') !!}
                    <span class="fw-semibold">{{ $paginator->lastItem() }}</span>
                    {!! __('su') !!}
                    <span class="fw-semibold">{{ $paginator->total() }}</span>
                    {!! __('risultati') !!}
                </p>
            </div>

            <div>
                <ul class="pagination">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                    @else
                        <li class="page_arrow">
                            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                                <i class="ri-arrow-left-s-line"></i>
                            </a>
                        </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <li class="page-item disabled" aria-disabled="true"><span
                                    class="page-link">{{ $element }}</span></li>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="page_number active" aria-current="page">
                                        <span class="">{{ $page }}</span>
                                    </li>
                                @else
                                    <li class="page_number">
                                        <a href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <li class="page_arrow">
                            <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                                <i class="ri-arrow-right-s-line"></i>
                            </a>
                        </li>
                    @else
                    @endif
                </ul>
            </div>
        </div>
    </nav>
@endif

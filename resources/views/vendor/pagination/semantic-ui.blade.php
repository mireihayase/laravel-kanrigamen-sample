@if ($paginator->hasPages())
    <div class="body-afc ui pagination menu" role="navigation"
         style="width: 100%;">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <button>
            <a class="icon item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                {{--<i class="left chevron icon"></i>--}}
                <i class="bi bi-chevron-left"></i>
            </a>
            </button>
        @else
            <button>
            <a class="icon item" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                {{--<i class="left chevron icon"></i>--}}
                <i class="bi bi-chevron-left"></i>
            </a>
            </button>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <a class="icon item disabled" aria-disabled="true">{{ $element }}</a>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a class="buttun1234" href="{{ $url }}" aria-current="page" style="text-decoration: none;">
                        <button class="buttun123" style="border: none;">{{ $page }}</button>
                        </a>
                    @else
                        <a class="" href="{{ $url }}"
                           style="text-decoration: none;
                            background-color: var(--color-1);
                            color: var(--color-2);
                            border: none;
                            border-radius: var(--border-radius-2);
                            padding: 8px 20px;
                            font-size: 16px;">
                        <button style="border: none;">{{ $page }}</button>
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach


        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <button>
            <a class="icon item" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                <i class="bi bi-chevron-right"></i>
                {{--<i class="right chevron icon"></i> --}}
            </a>
            </button>
        @else
            <button>
            <a class="icon item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                {{--<i class="right chevron icon"></i>--}}
                <i class="bi bi-chevron-right"></i>
            </a>
            </button>
        @endif
    </div>
@endif

@if ($paginator->hasPages())
    <ul class="pagination__list">
        {{-- رابط الصفحة السابقة --}}
        @if ($paginator->onFirstPage())
            <li class="disabled"><span>←</span></li>
        @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}" class="prev">
                    <svg class="nxt-arrow-icon">
                        <title>prev arrow</title>
                        <use xlink:href="#pagination-prev"></use>
                    </svg>
                </a>
            </li>
        @endif

        {{-- عناصر الترقيم --}}
        @foreach ($elements as $element)
            {{-- فاصل النقاط "..." --}}
            @if (is_string($element))
                <li><span class="dots">...</span></li>
            @endif

            {{-- مصفوفة الروابط --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li><a href="{{ $url }}" class="page-numbers page-number current"><h5>{{ $page }}</h5></a></li>
                    @else
                        <li><a href="{{ $url }}" class="page-numbers page-number"><h5>{{ $page }}</h5></a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- رابط الصفحة التالية --}}
        @if ($paginator->hasMorePages())
            <li>
                <a href="{{ $paginator->nextPageUrl() }}" class="next">
                    <svg class="nxt-arrow-icon">
                        <title>next arrow</title>
                        <use xlink:href="#pagination-next"></use>
                    </svg>
                </a>
            </li>
        @else
            <li class="disabled"><span>→</span></li>
        @endif
    </ul>

    {{-- عرض الموبايل --}}
    <ul class="mobile">
        <li class="mobile-total">
            <h5>{{ $paginator->currentPage() }} of {{ $paginator->lastPage() }}</h5>
        </li>

        {{-- زر السابق في الموبايل --}}
        @if (!$paginator->onFirstPage())
            <li class="mobile-prev">
                <a href="{{ $paginator->previousPageUrl() }}" class="prev">
                    <svg class="nxt-arrow-icon">
                        <title>prev arrow</title>
                        <use xlink:href="#pagination-prev"></use>
                    </svg>
                    <span>Previous</span>
                </a>
            </li>
        @endif

        {{-- زر التالي في الموبايل --}}
        @if ($paginator->hasMorePages())
            <li class="mobile-next">
                <a href="{{ $paginator->nextPageUrl() }}" class="next">
                    <span>Next</span>
                    <svg class="nxt-arrow-icon">
                        <title>next arrow</title>
                        <use xlink:href="#pagination-next"></use>
                    </svg>
                </a>
            </li>
        @endif
    </ul>
@endif

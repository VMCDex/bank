@if ($paginator->hasPages())
    <ul class="custom-pagination">
        @foreach ($elements as $element)
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active"><span class="current-page">{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}" class="page-number">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
    </ul>
@endif

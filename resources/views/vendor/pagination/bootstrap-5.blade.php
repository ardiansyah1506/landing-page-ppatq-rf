@if ($paginator->hasPages())
    <nav class="pagination-wrapper d-flex flex-column align-items-center" aria-label="Navigasi halaman">
        <ul class="pagination pagination-ppatq flex-wrap justify-content-center mb-2">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="Sebelumnya">
                    <span class="page-link" aria-hidden="true"><i class="bi bi-chevron-left"></i></span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="Sebelumnya"><i class="bi bi-chevron-left"></i></a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}" aria-label="Halaman {{ $page }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="Berikutnya"><i class="bi bi-chevron-right"></i></a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="Berikutnya">
                    <span class="page-link" aria-hidden="true"><i class="bi bi-chevron-right"></i></span>
                </li>
            @endif
        </ul>

        <p class="small text-muted text-center mb-0">
            Menampilkan <span class="fw-semibold">{{ $paginator->firstItem() }}</span>
            &ndash; <span class="fw-semibold">{{ $paginator->lastItem() }}</span>
            dari <span class="fw-semibold">{{ $paginator->total() }}</span> data
        </p>
    </nav>
@endif

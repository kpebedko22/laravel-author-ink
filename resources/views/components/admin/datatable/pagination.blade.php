@php
/**
 * @var Illuminate\Pagination\LengthAwarePaginator $paginator
 */
@endphp

<div class="row">
    <div class="col-sm-12 col-md-4">
        <div>
            {{ __('admin/view/datatable.pagination.counter', [
                'first' => $paginator->firstItem(),
                'last' => $paginator->lastItem(),
                'total' => $paginator->total(),
            ]) }}
        </div>
    </div>
    <div class="col-sm-12 col-md-7">
        <div>
            @if ($paginator->hasPages())
                <ul class="pagination">
                    @if ($paginator->onFirstPage())
                        <li class="page-item previous disabled">
                            <a href="#"
                               tabindex="0"
                               class="page-link"
                            >{{ __('admin/view/datatable.pagination.prev_page') }}</a>
                        </li>
                    @else
                        <li class="page-item previous">
                            <a href="{{ $paginator->previousPageUrl() . '&per_page=' . $paginator->perPage()}}"
                               tabindex="0"
                               class="page-link"
                            >{{ __('admin/view/datatable.pagination.prev_page') }}</a>
                        </li>
                    @endif

                    @foreach ($elements as $element)
                        @if (is_string($element))
                            <li class="page-item disabled">
                                {{ $element }}
                            </li>
                            <li class="page-item disabled">{{ $element }}</li>
                        @endif

                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="page-item active">
                                        <a class="page-link"
                                        >{{ $page }}</a>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a href="{{ $url . '&per_page=' . $paginator->perPage()}}"
                                           class="page-link"
                                        >{{ $page }}</a>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    @if ($paginator->hasMorePages())
                        <li class="page-item next">
                            <a href="{{ $paginator->nextPageUrl() . '&per_page=' . $paginator->perPage()}}"
                               class="page-link"
                            >{{ __('admin/view/datatable.pagination.next_page') }}</a>
                        </li>
                    @else
                        <li class="page-item next disabled">
                            <a href="#"
                               class="page-link"
                            >{{ __('admin/view/datatable.pagination.next_page') }}</a>
                        </li>
                    @endif
                </ul>
            @endif
        </div>
    </div>
</div>



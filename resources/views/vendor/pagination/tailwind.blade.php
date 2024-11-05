@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between">
        <!-- Previous Page Link -->
        @if ($paginator->onFirstPage())
            <span class="text-gray-500 cursor-not-allowed">
                {{ __('Previous') }}
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="p-3 bg-blue-500 text-white rounded-md">
                {{ __('Previous') }}
            </a>
        @endif

        <!-- Pagination Elements -->
        <div class="flex space-x-2">
            @foreach ($elements as $element)
                @if (is_string($element))
                    <span class="p-3 bg-gray-200 text-gray-500 rounded-md">
                        {{ $element }}
                    </span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="p-3 bg-blue-500 text-white rounded-md">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}" class="p-3 bg-blue-500 text-white rounded-md">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>

        <!-- Next Page Link -->
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="p-3 bg-blue-500 text-white rounded-md">
                {{ __('Next') }}
            </a>
        @else
            <span class="text-gray-500 cursor-not-allowed">
                {{ __('Next') }}
            </span>
        @endif
    </nav>
@endif

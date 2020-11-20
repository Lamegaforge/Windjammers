@if ($paginator->hasPages())
<nav class="flex items-center justify-between px-4 border-t border-gray-200 sm:px-0">
    <div class="flex flex-1 w-0 -mt-px">
        @if (!$paginator->onFirstPage())
        <a href="{{ $paginator->previousPageUrl() }}" class="inline-flex items-center pt-4 pr-1 text-sm font-medium text-gray-500 border-t-2 border-transparent hover:text-gray-700 hover:border-gray-300">
            <svg class="w-5 h-5 mr-3 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd" />
            </svg>
            Previous
        </a>
        @endif
    </div>
    <div class="hidden md:-mt-px md:flex">

        @foreach ($elements as $element)

        @if (is_string($element))
        <span class="inline-flex items-center px-4 pt-4 text-sm font-medium text-gray-500 border-t-2 border-transparent">
            {{ $element }}
        </span>
        @endif


        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <div class="inline-flex items-center px-4 pt-4 text-sm font-medium text-indigo-600 border-t-2 border-indigo-500" aria-current="page">
            {{ $page }}
        </div>
        @else
        <a href="{{ $url }}" class="inline-flex items-center px-4 pt-4 text-sm font-medium text-gray-500 border-t-2 border-transparent hover:text-gray-700 hover:border-gray-300">
            {{ $page }}
        </a>
        @endif
        @endforeach
        @endif
        @endforeach
    </div>
    <div class="flex justify-end flex-1 w-0 -mt-px">
        @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" class="inline-flex items-center pt-4 pl-1 text-sm font-medium text-gray-500 border-t-2 border-transparent hover:text-gray-700 hover:border-gray-300">
            Next
            <svg class="w-5 h-5 ml-3 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </a>
        @endif
    </div>
</nav>

@endif
<div class="relative inline-block text-left" x-data="{ open: false }">
    <div>
        <span class="rounded-md shadow-sm">
            <button @click="open = true" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition ease-in-out duration-150" id="options-menu" aria-haspopup="true" aria-expanded="true">
                Open dropdown
                <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
        </span>
    </div>
    <div class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg" x-show="open" @click.away="open = false">
        <div class="rounded-md bg-white shadow-xs">
            <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
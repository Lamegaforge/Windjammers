<nav class="fixed z-50 w-full transition duration-200 ease-in-out bg-transparent font-body" x-data="navbar()" @scroll.window="handleScroll" :class="{ 'bg-white shadow':  scrolled }">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="flex items-center flex-shrink-0">
                    <img class="block w-auto h-8 mr-2" src="{{asset('images/logo-disc.png')}}" alt="Windjammers France logo">
                    <a href="/" :class="{ 'gradient-text':  scrolled }" class="flex flex-col items-center justify-center ml-2 font-bold text-white uppercase transition duration-200 ease-in-out font-display">
                        <span class="text-sm">Windjammers</span>
                        <span style="font-size: 0.5rem">France</span>
                    </a>
                </div>
                <div class="hidden sm:ml-8 sm:flex">
                    <!-- <a href="#" class="inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-gray-900 transition duration-150 ease-in-out border-b-2 border-blue-500 focus:outline-none focus:border-blue-700">
                            Wiki
                        </a> -->
                    <a href="#" :class="{ 'text-gray-500 hover:text-gray-700': scrolled }" class="inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-white transition duration-200 ease-in-out border-b-2 border-transparent hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300">
                        @lang('navbar.wiki')
                    </a>
                    <a href="#" :class="{ 'text-gray-500 hover:text-gray-700': scrolled }" class="inline-flex items-center px-1 pt-1 ml-8 text-sm font-medium leading-5 text-white transition duration-100 ease-in-out border-b-2 border-transparent hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300">
                        @lang('navbar.posts')
                    </a>
                    <a href="#" :class="{ 'text-gray-500 hover:text-gray-700': scrolled }" class="inline-flex items-center px-1 pt-1 ml-8 text-sm font-medium leading-5 text-white transition duration-100 ease-in-out border-b-2 border-transparent hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300">
                        @lang('navbar.agenda')
                    </a>
                    <!-- <a href="#" class="inline-flex items-center px-1 pt-1 ml-8 text-sm font-medium leading-5 text-gray-500 transition duration-150 ease-in-out border-b-2 border-transparent hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300">
                        Actualités
                    </a>
                    <a href="#" class="inline-flex items-center px-1 pt-1 ml-8 text-sm font-medium leading-5 text-gray-500 transition duration-150 ease-in-out border-b-2 border-transparent hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300">
                        Agenda
                    </a> -->
                </div>
            </div>
            <!-- <div class="flex items-center justify-center flex-1 px-2 lg:ml-6 lg:justify-end">
                <div class="w-full max-w-lg lg:max-w-xs">
                    <label for="search" class="sr-only">Recherche</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input id="search" class="block w-full py-2 pl-10 pr-3 leading-5 placeholder-gray-500 transition duration-150 ease-in-out bg-transparent border border-gray-300 rounded-full focus:outline-none focus:placeholder-gray-400 focus:border-blue-300 focus:shadow-outline-blue sm:text-sm" placeholder="Recherche" type="search">
                    </div>
                </div>
            </div> -->
            <div class="flex items-center -mt-1 -mr-2 sm:hidden">
                <!-- Mobile menu button -->
                <button @click="open = !open" class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500" x-bind:aria-label="open ? 'Close main menu' : 'Main menu'" aria-label="Main menu" x-bind:aria-expanded="open">

                    <svg x-state:on="Menu open" x-state:off="Menu closed" :class="{ 'hidden': open, 'block': !open }" class="block w-6 h-6" x-description="Heroicon name: menu" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg x-state:on="Menu open" x-state:off="Menu closed" :class="{ 'hidden': !open, 'block': open }" class="hidden w-6 h-6" x-description="Heroicon name: x" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div x-description="Mobile menu, toggle classes based on menu state." x-state:on="Menu open" x-state:off="Menu closed" :class="{ 'block': open, 'hidden': !open }" class="hidden lg:hidden">
        <div class="pt-2 pb-3">
            <a href="#" class="block py-2 pl-3 pr-4 text-base font-medium text-blue-700 transition duration-150 ease-in-out border-l-4 border-blue-500 bg-blue-50 focus:outline-none focus:text-blue-800 focus:bg-blue-100 focus:border-blue-700">Wiki</a>
            <a href="#" class="block py-2 pl-3 pr-4 mt-1 text-base font-medium text-gray-600 transition duration-150 ease-in-out border-l-4 border-transparent hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300">Actualités</a>
            <a href="#" class="block py-2 pl-3 pr-4 mt-1 text-base font-medium text-gray-600 transition duration-150 ease-in-out border-l-4 border-transparent hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300">Agenda</a>
        </div>
    </div>
</nav>
<script>
    function navbar() {
        return {
            open: false,
            scrolled: false,
            handleScroll() {
                if (window.pageYOffset > 0) {
                    this.scrolled = true;
                } else {
                    this.scrolled = false;
                }
            }
        }

    }
</script>
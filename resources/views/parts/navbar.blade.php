<nav class="{{ $isHome ? 'fixed' : 'sticky top-0' }} z-50 w-full sm:transition sm:duration-200 sm:ease-in-out bg-transparent font-body" x-data="navbar({{$isHome}})" @resize.window="open = false" @scroll.window="handleScroll" :class="{ 'bg-white shadow-sm':  scrolled || open }">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="flex items-center flex-shrink-0">
                    <img class="block w-auto h-8 mr-2" src="{{asset('images/logo-disc.png')}}" alt="Windjammers France logo">
                    <a href="/" :class="{ 'gradient-text':  scrolled || open }" class="flex flex-col items-center justify-center ml-2 font-bold text-white uppercase transition ease-in-out sm:duration-200 font-display">
                        <span class="text-sm">Windjammers</span>
                        <span style="font-size: 0.5rem">France</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div x-description="Mobile menu, toggle classes based on menu state." x-state:on="Menu open" x-state:off="Menu closed" :class="{ 'block': open, 'hidden': !open }" class="hidden bg-white lg:hidden">
        <div class="pt-2 pb-3">
            @foreach($links as $link)
            <a href=" {{$link[1]}}" class="{{ $link[2] ? 'border-blue-500 text-blue-700 bg-blue-50' : 'hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300' }} block py-2 pl-3 pr-4 mt-1 text-base font-medium text-gray-600 transition duration-150 ease-in-out border-l-4 border-transparent  focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300">
                {{$link[0]}}
            </a>
            @endforeach
        </div>
    </div>
</nav>
<script>
    function navbar(isHome) {
        return {
            open: false,
            scrolled: isHome ? false : true,
            handleScroll() {
                if (!isHome) {
                    return;
                }
                if (window.pageYOffset > 0) {
                    this.scrolled = true;
                } else {
                    this.scrolled = false;
                }
            }
        }

    }
</script>
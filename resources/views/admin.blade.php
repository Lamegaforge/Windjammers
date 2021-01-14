<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Windjammers France</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>

<body class="antialiased">
    <main class="min-h-screen font-body">
        <nav class="sticky top-0 z-50 flex-shrink-0 w-full bg-indigo-600">
            <div class="px-2 mx-auto max-w-7xl sm:px-4 lg:px-8">
                <div class="relative flex items-center justify-between h-16">
                    <div class="flex items-center flex-shrink-0">
                        <img class="block w-auto h-8 mr-2" src="{{asset('images/logo-disc.png')}}" alt="Windjammers France logo">
                        <a href="/" class="flex flex-col items-center justify-center ml-2 font-bold text-white uppercase transition ease-in-out sm:duration-200 font-display">
                            <span class="text-sm">Windjammers</span>
                            <span style="font-size: 0.5rem">France</span>
                        </a>
                    </div>

                    <!-- Search section -->
                    <div class="flex justify-center flex-1 lg:justify-end">
                        <div class="w-full px-2 lg:pr-6 lg:w-80">
                            <label for="search" class="sr-only">Search posts</label>
                            <div class="relative text-indigo-200 focus-within:text-gray-400">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <!-- Heroicon name: search -->
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input id="search" name="search" class="block w-full py-2 pl-10 pr-3 leading-5 text-indigo-100 placeholder-indigo-200 bg-indigo-400 bg-opacity-25 border border-transparent rounded-md focus:outline-none focus:bg-white focus:ring-0 focus:placeholder-gray-400 focus:text-gray-900 sm:text-sm" placeholder="Search posts" type="search">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        @yield('content')
    </main>
</body>

</html>
@extends('admin')
@section('content')

<div class="flex-grow w-full pb-8 mx-auto max-w-7xl xl:px-8 lg:flex">
    <!-- Left sidebar & main wrapper -->
    <div class="flex-1 min-w-0 bg-white xl:flex">
        <!-- Account profile -->
        <div class="bg-white xl:flex-shrink-0 xl:w-64 xl:border-r xl:border-gray-200">
            <div class="py-6 pl-4 pr-6 sm:pl-6 lg:pl-8 xl:pl-0">
                <div class="flex items-center justify-between">
                    <div class="flex-1 space-y-8">
                        <div class="space-y-8 sm:space-y-0 sm:flex sm:justify-between sm:items-center xl:block xl:space-y-8">
                            <!-- Profile -->
                            <div class="flex items-center space-x-3">
                                <div class="flex-shrink-0 w-12 h-12">
                                    <div class="w-12 h-12 rounded-full bg-gradient-to-b to-yellow-500 from-blue-500"></div>
                                    <!-- <img class="w-12 h-12 rounded-full" src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=256&h=256&q=80" alt=""> -->
                                </div>
                                <div class="space-y-1">
                                    <div class="text-sm font-medium text-gray-900">Tuxo</div>
                                </div>
                            </div>
                            <!-- Action buttons -->
                            <div class="flex flex-col sm:flex-row xl:flex-col">
                                <a href="{{route('posts.create')}}" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 xl:w-full">
                                    New Post
                                </a>
                            </div>
                        </div>
                        <!-- Meta info -->
                        <div class="flex flex-col space-y-6 sm:flex-row sm:space-y-0 sm:space-x-8 xl:flex-col xl:space-x-0 xl:space-y-6">
                            <div class="flex items-center space-x-2">
                                <!-- Heroicon name: collection -->
                                <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />
                                </svg>
                                <span class="text-sm font-medium text-gray-500">{{$post_count}} Posts</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Projects List -->
        <div class="bg-white lg:min-w-0 lg:flex-1 xl:border-r xl:border-gray-200">
            <div class="pt-4 pb-4 pl-4 pr-6 border-t border-b border-gray-200 sm:pl-6 lg:pl-8 xl:pl-6 xl:pt-6 xl:border-t-0">
                <div class="flex items-center">
                    <h1 class="flex-1 text-lg font-medium">Posts</h1>
                    <div class="relative">
                        <button id="sort-menu" type="button" class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" aria-haspopup="true" aria-expanded="false">
                            <!-- Heroicon name: sort-ascending -->
                            <svg class="w-5 h-5 mr-3 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h5a1 1 0 000-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM13 16a1 1 0 102 0v-5.586l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 101.414 1.414L13 10.414V16z" />
                            </svg>
                            Sort
                            <!-- Heroicon name: chevron-down -->
                            <svg class="ml-2.5 -mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <!-- <div class="absolute right-0 z-10 w-56 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5">
                                <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="sort-menu">
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Name</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Date modified</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Date created</a>
                                </div>
                            </div> -->
                    </div>
                </div>
            </div>
            <ul class="relative z-0 border-b border-gray-200 divide-y divide-gray-200">
                @foreach ($posts as $post)
                <li>
                    <a class="block py-5 pl-4 pr-6 hover:bg-gray-50 sm:py-6 sm:pl-6 lg:pl-8 xl:pl-6" href="{{route('posts.edit', $post->id)}}">{{$post->title}}</a>
                </li>
                @endforeach
            </ul>
            <div class="px-4 pb-4 border-b border-gray-200">
                {{$posts->links('home.pagination')}}
            </div>
        </div>
    </div>
</div>
</div>
@endsection
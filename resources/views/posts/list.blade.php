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

        <!-- Posts List -->
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
                    </div>
                </div>
            </div>
            <div class="sm:hidden">
                <ul class="divide-y divide-gray-100">
                    @foreach ($posts as $post)
                    <li>
                        <a href="{{route('posts.edit', $post->id)}}" class="flex items-center justify-between px-4 py-4 group hover:bg-gray-50 sm:px-6">
                            <span class="flex items-center space-x-3 truncate">
                                <span class="{{$post->active ? 'bg-green-100' : 'bg-pink-100'}} flex items-center justify-center w-4 h-4 rounded-full" aria-hidden="true">
                                    <span class="{{$post->active ? 'bg-green-400' : 'bg-pink-400'}} w-2 h-2 bg-green-400 rounded-full"></span>
                                </span>
                                <span class="text-sm font-medium leading-6 truncate">
                                    {{$post->title}}
                                </span>
                            </span>
                            <!-- Heroicon name: solid/chevron-right -->
                            <svg class="w-5 h-5 ml-4 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="hidden sm:block">
                <div class="inline-block min-w-full align-middle border-b border-gray-200">
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    <span class="lg:pl-2">Title</span>
                                </th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Language
                                </th>
                                <th class="hidden px-6 py-3 text-xs font-medium tracking-wider text-right text-gray-500 uppercase border-b border-gray-200 md:table-cell bg-gray-50">
                                    Publish date
                                </th>
                                <th class="py-3 pr-6 text-xs font-medium tracking-wider text-right text-gray-500 uppercase border-b border-gray-200 bg-gray-50"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @foreach ($posts as $post)
                            <tr>
                                <td class="w-full px-6 py-3 text-sm font-medium text-gray-900 max-w-0 whitespace-nowrap">
                                    <div class="flex items-center space-x-3 lg:pl-2">
                                        <span class="{{$post->active ? 'bg-green-100' : 'bg-pink-100'}} flex items-center justify-center w-4 h-4 rounded-full" aria-hidden="true">
                                            <span class="{{$post->active ? 'bg-green-400' : 'bg-pink-400'}} w-2 h-2 bg-green-400 rounded-full"></span>
                                        </span>
                                        <a href="{{route('posts.show', $post->slug)}}" class="truncate hover:text-gray-600">
                                            <span>
                                                {{$post->title}}
                                            </span>
                                        </a>
                                    </div>
                                </td>
                                <td class="px-6 py-3 text-sm font-medium text-gray-500">
                                    {{$post->language}}
                                </td>
                                <td class="hidden px-6 py-3 text-sm text-right text-gray-500 md:table-cell whitespace-nowrap">
                                    @datetime($post->published_at)
                                </td>
                                <td class="pr-6">
                                    <div class="relative flex items-center justify-end">
                                        <div x-data="{ open: false }">
                                            <button @click="open = true" :aria-haspopup="open" class="inline-flex items-center justify-center w-8 h-8 text-gray-400 bg-white rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                                                <span class="sr-only">Open options</span>
                                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                                </svg>
                                            </button>
                                            <div x-show="open" @click.away="open = false" :class="{'opacity-100 scale-100': open, 'opacity-0 scale-95 pointer-events-none': !open}" class="absolute z-10 w-48 mx-3 mt-1 transition duration-75 ease-in origin-top-right bg-white divide-y divide-gray-200 rounded-md shadow-lg right-10 top-3 ring-1 ring-black ring-opacity-5" role="menu" aria-orientation="vertical" aria-labelledby="post-options-menu">
                                                <div class="py-1" role="none">
                                                    <a href="{{route('posts.edit', $post->id)}}" class="flex items-center px-4 py-2 text-sm text-gray-700 group hover:bg-gray-100 hover:text-gray-900" role="menuitem">
                                                        <!-- Heroicon name: solid/pencil-alt -->
                                                        <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                            <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                                        </svg>
                                                        Edit
                                                    </a>
                                                </div>
                                                <div class="py-1" role="none">
                                                    <a href="{{route('posts.delete', $post->id)}}" class="flex items-center px-4 py-2 text-sm text-gray-700 group hover:bg-gray-100 hover:text-gray-900" role="menuitem">
                                                        <!-- Heroicon name: solid/trash -->
                                                        <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                        </svg>
                                                        Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="px-4 pb-4 border-b border-gray-200">
                {{$posts->links('home.pagination')}}
            </div>
        </div>
    </div>
</div>
</div>
@endsection
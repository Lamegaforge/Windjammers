@extends('app')
@section('content')
<section class="px-4 py-16 bg-white lg:px-8 lg:py-24 md:py-20 sm:px-6">
    <div class="max-w-3xl mx-auto">
        <article>
            <header>
                <div class="space-y-1 text-center">
                    <dl class="space-y-10">
                        <div>
                            <dt class="sr-only">Published on</dt>
                            <dd class="text-base font-medium leading-6 text-gray-500">
                                <time datetime="{{$post->published_at}}">@datetime($post->published_at)</time>
                            </dd>
                        </div>
                    </dl>
                    <h1 class="text-3xl font-extrabold leading-9 tracking-tight text-gray-900 sm:text-4xl lg:text-5xl">{{$post->title}}</h1>
                    <dl class="pt-6 pb-10 border-b border-gray-200">
                        <dt class="sr-only">Author</dt>
                        <dd>
                            <ul class="flex justify-center space-x-8">
                                <li class="flex items-center space-x-2">
                                    <!-- <img src="" alt="" class="w-10 h-10 rounded-full"> -->
                                    <div class="w-10 h-10 rounded-full bg-gradient-to-b to-yellow-500 from-blue-500"></div>
                                    <dl class="text-sm font-medium leading-5 whitespace-no-wrap">
                                        <dt class="sr-only">Name</dt>
                                        <dd class="text-gray-900">Tuxo</dd>
                                        <!-- <dt class="sr-only">Twitter</dt> -->
                                        <!-- <dd><a href="https://twitter.com/??" class="text-teal-500 hover:text-teal-600">@??</a></dd> -->
                                    </dl>
                                </li>
                            </ul>
                        </dd>
                    </dl>
                </div>
            </header>
            <div class="pt-10 pb-8 prose lg:pt-14 max-w-none lg:prose-xl">
                <img class="max-w-full pb-3 mx-auto" src="{{$post->thumbnail}}" />
                @markdown($post->content)
            </div>
        </article>
    </div>
</section>

@endsection
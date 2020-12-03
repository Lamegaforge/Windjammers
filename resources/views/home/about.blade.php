@extends('app')
@section('content')
<section class="px-4 py-16 bg-white lg:px-8 lg:py-24 md:py-20 sm:px-6">
    <div class="max-w-3xl mx-auto">
        <article>
            <header>
                <div class="space-y-1 text-center">
                    <h1 class="text-3xl font-extrabold leading-9 tracking-tight text-gray-900 sm:text-4xl lg:text-5xl">@lang('about.title')</h1>
                </div>
            </header>
            <div class="pt-10 pb-8 prose lg:pt-14 max-w-none lg:prose-xl ">
                <img class="max-w-full mx-auto shadow-lg" src="{{'/images/windjammers_fr_logo.jpg'}}" />
                @lang('about.content')
                <iframe width="560" height="315" src="https://www.youtube.com/embed/8IuCM-L5Um4" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </article>
    </div>
</section>
@endsection
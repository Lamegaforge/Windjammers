@extends('app')
@section('content')
<section class="px-4 py-16 bg-gray-50 lg:px-8 lg:py-24 md:py-20 sm:px-6">
    <div class="mx-auto lg:max-w-7xl">
        <h2 class="text-3xl font-extrabold tracking-tight text-gray-800 sm:text-4xl">
            Toutes les actualités
        </h2>
        <div class="grid gap-5 mx-auto mt-12 sm:grid-cols-2 lg:grid-cols-3 lg:max-w-none">
            @foreach ($posts as $post)
            <x-post-card :post="$post" />
            @endforeach
        </div>
        <div class="mt-12">
            {{$posts->links('home.pagination')}}
        </div>
    </div>
</section>

@endsection
@extends('admin')
@section('content')

<div class="flex-grow w-full pb-8 mx-auto max-w-7xl xl:px-8 lg:flex">
    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <div class="mt-1">
                <input type="text" name="title" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Your title" value="{{$post->title}}">
            </div>
        </div>

        <div>
            <label for="highlight" class="block text-sm font-medium text-gray-700">Highlight</label>
            <div class="mt-1">
                <input type="text" name="highlight" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Your highlight" value="{{$post->highlight}}">
            </div>
        </div>

        <div>
            <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
            <div class="mt-1">
                <input type="text" name="content" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Your content" value="{{$post->content}}">
            </div>
        </div>

        <div>
            <label for="language" class="block text-sm font-medium text-gray-700">Language</label>
            <select name="language" class="block w-full py-2 pl-3 pr-10 mt-1 text-base border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{$post->language}}">
                <option>fr</option>
                <option>en</option>
            </select>
        </div>

        <div>
            <label for="active" class="block text-sm font-medium text-gray-700">Active</label>
            <div class="mt-1">
                <input type="text" name="active" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{$post->active}}">
            </div>
        </div>

        <input type="submit" value="Save">
    </form>
</div>
@endsection
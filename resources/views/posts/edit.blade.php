@extends('admin')
@section('content')

<div class="px-4 py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto">
        <form class="space-y-8 divide-y divide-gray-200" action="{{ route('posts.update', $post->id) }}" method="POST">
            <div>
                @if(session()->has('message'))
                <div class="p-4 mb-10 rounded-md bg-green-50">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="w-5 h-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-green-800">
                                {{session('message')}}
                            </p>
                        </div>
                    </div>
                </div>
                @endif
                @if($errors->any())
                <div class="p-4 mb-10 rounded-md bg-red-50">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="w-5 h-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-red-800">
                                There were errors with your submission
                            </h3>
                            <div class="mt-2 text-sm text-red-700">
                                <ul class="pl-5 space-y-1 list-disc">
                                    @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <div>
                    <h3 class="text-lg font-medium leading-6 text-gray-900">
                        {{$post->title}}
                    </h3>
                    <p class="mt-1 text-sm text-gray-500">
                        Dernière modification: {{$post->updated_at}}
                    </p>
                </div>
                <div class="grid grid-cols-1 mt-6 gap-y-6 gap-x-4 sm:grid-cols-6">
                    @csrf
                    <div class="sm:col-span-3">
                        <label for="language" class="block text-sm font-medium text-gray-700">
                            Language
                        </label>
                        <div class="mt-1">
                            <select value="{{$post->language}}" name="language" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option {{$post->language === 'fr' ? 'selected' : ''}} value="fr">Français</option>
                                <option {{$post->language === 'en' ? 'selected' : ''}} value="en">English</option>
                            </select>
                        </div>
                    </div>
                    <div class="sm:col-span-4">
                        <label for="thumbnail" class="block text-sm font-medium text-gray-700">
                            Thumbnail
                        </label>
                        <div x-data="{ file: {{$post->thumbnail ? $post->thumbnail : 'null'}} }" class="flex items-center justify-center px-6 pt-5 pb-6 mt-2 border-2 border-gray-300 border-dashed rounded-md sm:px-3" style="height: calc(100% - 28px);">
                            <template x-if="file === null">
                                <div class="space-y-1 text-center"><svg stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true" class="w-12 h-12 mx-auto text-gray-400">
                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                    <div class="flex text-sm text-gray-600">
                                        <label for="file-upload" class="relative font-medium text-indigo-600 bg-white rounded-md cursor-pointer hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                            <span>Upload a file</span>
                                            <input x-on:change="file = $event.target.files[0];console.log(file)" id="file-upload" name="file-upload" type="file" class="sr-only">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500">
                                        PNG, JPG, GIF up to 10MB
                                    </p>
                                </div>
                            </template>
                            <template x-if="file !== null">
                                <p x-text="file.name">

                                </p>
                            </template>
                        </div>
                    </div>
                    <div class="sm:col-span-4"><label for="title" class="block text-sm font-medium text-gray-700">
                            Title
                        </label>
                        <div class="mt-1">
                            <input value="{{$post->title}}" id="title" name="title" type="text" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                    </div>
                    <div class="sm:col-span-6">
                        <label for="highlight" class="block text-sm font-medium text-gray-700">
                            Highlight
                        </label>
                        <div class="mt-1">
                            <textarea id="highlight" name="highlight" rows="3" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{$post->highlight}}</textarea>
                        </div>
                        <p class="mt-2 text-sm text-gray-500">Ceci correspond au texte de preview.</p>
                    </div>
                    <div class="sm:col-span-6">
                        <label for="content" class="block text-sm font-medium text-gray-700">
                            Content
                        </label>
                        <div class="mt-1">
                            <x-markdown-editor preview-url="{{ route('posts.markdown') }}" :content="json_encode($post->content)" />
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <div class="flex items-center justify-between">
                            <span class="flex flex-col flex-grow" id="toggleLabel">
                                <span class="text-sm font-medium text-gray-900">Activer</span>
                                <span class="text-sm leading-normal text-gray-500">L'article sera visible par les visiteurs.</span>
                            </span>
                            <button x-data="{ active: '{{$post->active}}' }" @click="active = !active" :class="{ 'bg-indigo-600': active, 'bg-gray-200': !active }" type="button" class="relative inline-flex flex-shrink-0 h-6 transition-colors duration-200 ease-in-out border-2 border-transparent rounded-full cursor-pointer w-11 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <span class="sr-only">Enabled post</span>
                                <span aria-hidden="true" :class="{ 'translate-x-5': active, 'translate-x-0': !active }" class="inline-block w-5 h-5 transition duration-200 ease-in-out transform bg-white rounded-full shadow ring-0"></span>
                                <input type="hidden" name="active" :value="active ? 1 : 0">
                            </button>
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="content" class="block text-sm font-medium text-gray-700">
                            Publish date
                        </label>
                        <div class="mt-1">
                            <input type="datetime-local" name="published_at" value="{{$post->published_at?->toDateTimeLocalString() ?? date('Y-m-d')}}" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                    </div>
                </div>
            </div>
            <div class="pt-4 mt-10 border-t border-gray-200">
                <div class="flex justify-end">
                    <button type="button" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Cancel
                    </button>
                    <button type="submit" class="inline-flex justify-center px-4 py-2 ml-3 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
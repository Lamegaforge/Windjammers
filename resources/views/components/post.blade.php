<a href="{{route('home.post', $slug)}}" class="flex flex-col overflow-hidden transition-all duration-300 ease-in-out transform rounded-lg shadow-lg md:hover:-translate-y-2 md:hover:shadow-xl">
    <div class="flex-shrink-0 ">
        <img class="object-cover w-full h-48" src="{{$cover}}" alt="">
    </div>
    <div class="flex flex-col justify-between flex-1 p-6 bg-white">
        <div class="flex-1">
            <p class="text-sm font-medium text-gray-500">
                {{$date}}
            </p>
            <div class="block mt-2">
                <p class="text-xl font-semibold text-gray-900">
                    {{$title}}
                </p>
                <p class="mt-3 text-base text-gray-500">
                    {{$extract}}
                </p>
            </div>
        </div>
    </div>
</a>
<div class="overflow-hidden bg-white rounded-lg shadow">
    <div class="px-4 py-5 sm:p-6">
        <div class="flex items-center space-x-3">
            <p class="font-semibold">{{$tournament['name']}}</p>
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{$badgeClasses}}">
                {{$badgeText}}
            </span>
        </div>
        <p class="mt-1 text-sm text-gray-500">{{$tournament['start_time']}} • {{$tournament['registered']}} @choice('inscrit|inscrits', $tournament['registered'])</p>
        <div class="flex flex-col mt-4 justify-stretch">
            <a href="{{$buttonUrl}}" rel="noreferrer nofollow noopener" target="_blank" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-blue-700 bg-blue-100 border border-transparent rounded-md shadow-sm hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                {{$buttonText}}
            </a>
        </div>
    </div>
</div>
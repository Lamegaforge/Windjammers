@extends('app')

@push('metas')
<meta property='og:title' content="Stage picker">
@endpush

@section('content')
<section class="relative flex items-center justify-center min-h-screen px-4 pt-16 pb-20 bg-gray-900 sm:px-6 lg:pt-24 lg:pb-28 lg:px-8">
    <div class="grid w-full max-w-4xl grid-cols-1">
        <div>
            <p class="mb-3 text-center text-white font-display">Contrainte</p>
            <x-picker-constraint :items="$constraints" />
        </div>
    </div>
    <div class="grid w-full max-w-4xl grid-cols-2">
        <div>
            <p class="mb-3 text-center text-white font-display">Stage</p>
            <x-picker :items="$stages" />
        </div>
        <div>
            <p class="mb-3 text-center text-white font-display">Player</p>
            <x-picker :items="$players" />
        </div>
    </div>
</section>
@endsection
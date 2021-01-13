@extends('app')

@push('metas')
<meta property='og:title' content="Stage picker">
@endpush

@section('content')
<section class="relative flex items-center justify-center min-h-screen px-4 pt-16 pb-20 bg-gray-900 sm:px-6 lg:pt-24 lg:pb-28 lg:px-8">
    <x-picker :items="$stages" />
</section>
@endsection
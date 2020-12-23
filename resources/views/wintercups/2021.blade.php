@extends('app')
@section('content')
<section class="relative flex items-center min-h-450px lg:min-h-600px xl:min-h-800px">
    <div class="relative z-10 max-w-screen-md px-4 mx-auto sm:px-6">
        <h1 class="text-lg text-white md:text-2xl lg:text-3xl font-display text-shadow">Winter Cup 2021</h1>
        <h2 class="text-lg text-white md:text-1xl lg:text-1xl font-display text-shadow">du fun, du frais, du frisbee</h2>
    </div>
    <div class="scanlines"></div>
    <div x-data="parallaxBackground()" x-ref="bg" @scroll.window="handleScroll" class="absolute top-0 left-0 w-full h-full bg-no-repeat bg-cover -z-1" style="background-image: url('{{ asset('images/disc-dog.jpg')}}');background-position-x: center;"></div>
</section>
<section class="relative px-4 pt-16 pb-20 bg-white sm:px-6 lg:pt-24 lg:pb-28 lg:px-8">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 200" class="absolute left-0 z-10 -mt-4 bottom-full">
        <path fill="#ffffff" fill-opacity="1" d="M0,128L60,117.3C120,107,240,85,360,101.3C480,117,600,171,720,176C840,181,960,139,1080,112C1200,85,1320,75,1380,69.3L1440,64L1440,200L1380,200C1200,200,1200,200,1080,200C960,200,840,200,720,200C600,200,480,200,360,200C240,200,120,200,60,200L0,200Z"></path>
    </svg>
    <div class="grid max-w-3xl grid-cols-1 gap-8 mx-auto lg:max-w-7xl lg:grid-flow-col-dense lg:grid-cols-3">
        <div class="px-1 space-y-6 overflow-hidden lg:col-start-1 lg:col-span-2">
            <h2 class="text-lg font-medium text-gray-900">Leaderboard</h2>
            @include('wintercups.leaderboard')
        </div>
        <div class="space-y-6 lg:col-start-3 lg:col-span-1">
            <h2 class="text-lg font-medium text-gray-900">Les tournois à venir</h2>
            <div class="space-y-3">
                @foreach ($tournaments as $cup)
                <x-tournament-card :tournament="$cup" />
                @endforeach
            </div>
        </div>
    </div>
</section>
<script>
    function parallaxBackground() {
        return {
            coords: '0px',
            speed: 3,
            handleScroll() {
                let yPos = window.scrollY / this.speed;
                this.coords = yPos + "px";
                this.$refs.bg.style.transform = `translate3d(0px, ${this.coords}, 0px)`;
            }
        }
    }
</script>
@endsection
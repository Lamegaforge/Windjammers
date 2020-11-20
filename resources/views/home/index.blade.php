@extends('app')
@section('content')
<section class="relative flex items-center h-screen min-h-450px">
    <div class="relative z-10 max-w-screen-md px-4 mx-auto sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 xl:mt-28">
        <h1 class="text-white font-display text-shadow">Incredibly fun and intensely addictive, Windjammers, the perfect blend between sports and fighting game, is the adrenaline rush you’re looking for!</h1>
    </div>
    <div class="scanlines"></div>
    <div x-data="parallaxBackground()" x-ref="bg" @scroll.window="handleScroll" class="absolute top-0 left-0 w-full h-full bg-no-repeat bg-cover -z-1" style="background-image: url('{{ asset('images/beach.jpg')}}');background-position-x: center;"></div>
</section>
<section class="relative px-4 pt-16 pb-20 bg-gray-50 sm:px-6 lg:pt-24 lg:pb-28 lg:px-8">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="absolute left-0 z-10 -top-16 sm:-top-32 md:-top-36 lg:-top-40 xl:-top-48">
        <path fill="#f9fafb" fill-opacity="1" d="M0,128L60,117.3C120,107,240,85,360,101.3C480,117,600,171,720,176C840,181,960,139,1080,112C1200,85,1320,75,1380,69.3L1440,64L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path>
    </svg>
    <div class="relative z-20 max-w-lg mx-auto lg:max-w-7xl">
        <h2 class="text-3xl font-extrabold tracking-tight text-gray-800 sm:text-4xl">
            Dernières actualités
        </h2>
        <div class="grid max-w-lg gap-5 mx-auto mt-12 lg:grid-cols-3 lg:max-w-none">
            @foreach ($posts as $post)
            <x-post-card :post="$post" />
            @endforeach
        </div>
        <div class="mt-12 text-center">
            <a href="" class="px-6 py-3 text-base font-semibold text-blue-700 bg-blue-100 rounded-lg">Plus d'actualités</a>
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
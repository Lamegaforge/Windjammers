@extends('app')
@section('content')
<section class="px-4 py-16 bg-white lg:px-8 lg:py-24 md:py-20 sm:px-6">
    <div class="max-w-3xl mx-auto">
        <article>
            <header>
                <div class="space-y-1 text-center">
                    <h1 class="text-3xl font-extrabold leading-9 tracking-tight text-gray-900 sm:text-4xl lg:text-5xl">À propos</h1>
                </div>
            </header>
            <div class="pt-10 pb-8 prose lg:pt-14 max-w-none lg:prose-xl">
                <img class="max-w-full pb-3 mx-auto" src="{{'/images/beach.jpg'}}" />
                <p><b>Windjammers France</b> est une communauté de joueurs dédiés au jeu Windjammers.</p>
                <p>Ce jeu de frisbee atypique a vu le jour en 1994 en arcade, développé par <b>Data East pour la Neo·Geo</b>. Aujourd'hui, en plus du support original et de l'émulation, on peut s'y adonner sur <b>PS4, PSVita et Nintendo Switch grâce à un portage réalisé par Dotemu</b>.</p>
                <p>Créée en 2012 autour de Dan et Wolmar, de plus en plus de joueurs ont rejoint la communauté pour découvrir ou redécouvrir ce jeu qui allie fun immédiat et profondeur compétitive.</p>
                <p><b>Des tournois en ligne sur GGPO puis FightCade</b>, nous nous sommes retrouvés à plusieurs reprises lors de divers évènements et notamment le <b>Stunfest et le HFS Summer</b> durant lesquels nous avons pu organiser de magnifiques tournois dont le DiscMania, notre compétition annuelle de référence.</p>
                <p>Vous trouverez tous les liens pour nous suivre, nous rejoindre, en apprendre davantage sur le jeu en bas de page.</p>
            </div>
        </article>
    </div>
</section>
@endsection
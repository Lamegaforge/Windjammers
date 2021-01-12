@extends('app')

@push('metas')
<meta property='og:title' content="Stage picker">
<link rel="prefetch" href="/images/players/mita.gif" />
<link rel="prefetch" href="/images/players/miller.gif" />
<link rel="prefetch" href="/images/players/costa.gif" />
<link rel="prefetch" href="/images/players/biaggi.gif" />
<link rel="prefetch" href="/images/players/scott.gif" />
<link rel="prefetch" href="/images/players/wessel.gif" />
@endpush

@section('content')
<section class="relative flex items-center justify-center min-h-screen px-4 pt-16 pb-20 bg-gray-900 sm:px-6 lg:pt-24 lg:pb-28 lg:px-8">
    <div x-data="picker()" class="text-center">
        <template x-if="started">
            <div>
                <img class="mx-auto border-8 border-yellow-300" :src="`images/players/${player.src}`" />
                <p x-show="stopped" x-text="player.name" class="mt-4 text-white font-display"></p>
            </div>
        </template>
        <template x-if="!started">
            <button x-on:click="start" type="button" class="inline-flex items-center px-6 py-3 mx-auto mt-6 text-base font-medium text-yellow-400 bg-transparent border border-yellow-300 shadow-sm font-display hover:bg-yellow-300 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Start
            </button>
        </template>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.3.2/dist/confetti.browser.min.js"></script>
<script>
    const players = [{
            name: 'Mita',
            src: 'mita.png',
        },
        {
            name: 'Miller',
            src: 'miller.png'
        },
        {
            name: 'Costa',
            src: 'costa.png'
        }, 
        {
            name: 'Biaggi',
            src: 'biaggi.png',
        },
        {
            name: 'Scott',
            src: 'scott.png'
        }, {
            name: 'Wessel',
            src: 'wessel.png'
        }
    ]

    function picker() {
        return {
            player: {},
            started: false,
            stopped: true,
            start() {
                this.shuffle(players);
                let i = 0;
                let self = this;
                this.started = true;
                this.stopped = false;
                this.player = players[0];

                let intervalHandle = window.setInterval(function() {
                    let index = i++ % players.length;
                    self.player = players[index];
                }, 70);

                setTimeout(function() {
                    clearInterval(intervalHandle);
                    self.stopped = true;
                    confetti({
                        origin: {
                            x: 0.35,
                            y: 0.75
                        }
                    });
                    confetti({
                        origin: {
                            x: 0.65,
                            y: 0.75
                        }
                    });
                }, 3000);
            },
            shuffle(array) {
                for (var i = array.length - 1; i > 0; i--) {
                    var j = Math.floor(Math.random() * (i + 1));
                    var temp = array[i];
                    array[i] = array[j];
                    array[j] = temp;
                }

                return array;
            }
        }
    }
</script>
@endsection
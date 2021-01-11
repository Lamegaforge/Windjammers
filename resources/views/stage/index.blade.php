@extends('app')

@push('metas')
<meta property='og:title' content="Stage picker">
@endpush

@section('content')
<section class="relative flex items-center justify-center min-h-screen px-4 pt-16 pb-20 bg-gray-900 sm:px-6 lg:pt-24 lg:pb-28 lg:px-8">
    <div x-data="picker()" class="text-center">
        <template x-show="started">
            <div>
                <img class="mx-auto border-8 border-yellow-300" :src="`images/stages/${stage.src}`" />
                <p x-show="stopped" x-text="stage.name" class="mt-4 text-white font-display"></p>
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
    const stages = [{
            name: 'Beach',
            src: 'beach.gif',
        },
        {
            name: 'Clay',
            src: 'clay.gif'
        },
        {
            name: 'Concrete',
            src: 'concrete.gif'
        }, {
            name: 'Lawn',
            src: 'lawn.gif',
        },
        {
            name: 'Stadium',
            src: 'stadium.gif'
        }, {
            name: 'Tiled',
            src: 'tiled.gif'
        }
    ]

    function picker() {
        return {
            stage: {},
            started: false,
            stopped: true,
            start() {
                this.shuffle(stages);
                let i = 0;
                let self = this;
                this.started = true;
                this.stopped = false;
                this.stage = stages[0];

                let intervalHandle = window.setInterval(function() {
                    let index = i++ % stages.length;
                    self.stage = stages[index];
                }, 70);

                setTimeout(function() {
                    clearInterval(intervalHandle);
                    self.stopped = true;
                    confetti({
                        origin: {
                            x: 0.75,
                            y: 0.75
                        }
                    });
                    confetti({
                        origin: {
                            x: 0.25,
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
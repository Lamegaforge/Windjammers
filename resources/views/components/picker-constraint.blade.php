<div x-data="picker({{json_encode($items)}})" class="text-center">
    <template x-if="started">
        <div>
            <p x-text="item" class="mt-4 text-white font-display"></p>
        </div>
    </template>
    <template x-if="!started">
        <button x-on:click="start" type="button" class="inline-flex items-center px-6 py-3 mx-auto mt-6 text-base font-medium text-yellow-400 bg-transparent border border-yellow-300 shadow-sm font-display hover:bg-yellow-300 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Start
        </button>
    </template>
</div>
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.3.2/dist/confetti.browser.min.js"></script>
<script>
    function picker(items) {
        return {
            item: {},
            started: false,
            stopped: true,
            start() {
                result = items[0];
                items = this.shuffle(items);
                let i = 0;
                let self = this;
                this.started = true;
                this.stopped = false;
                this.item = items[0];

                let intervalHandle = window.setInterval(function() {
                    let index = i++ % items.length;
                    self.item = items[index];
                }, 70);

                setTimeout(function() {
                    clearInterval(intervalHandle);
                    self.item = this.result;
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
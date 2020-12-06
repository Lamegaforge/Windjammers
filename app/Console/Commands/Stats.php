<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\FightcadeClient;
use App\Services\FightcadeService;
use Illuminate\Support\Facades\Http;

class Stats extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stats {playerOne} {playerTwo}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $playerOne = strtolower($this->argument('playerOne'));
        $playerTwo = strtolower($this->argument('playerTwo'));

        $playerOne = app(FightcadeClient::class)->user($playerOne);
        $playerTwo = app(FightcadeClient::class)->user($playerTwo);

        $history = app(FightcadeService::class)->compare(
            $playerOne['name'], 
            $playerTwo['name']
        );

        $players = [
            $playerOne,
            $playerTwo,
        ];

        app(FightcadeService::class)->store($players, $history);

        $this->info('done');

        return 0;
    }
}

<?php

namespace App\Console\Commands\Cups;

use Exception;
use App\Models\Cup;
use App\Models\Player;
use App\Models\Tournament;
use Illuminate\Console\Command;
use App\Services\Cups\ParticipationService;

class AddParticipation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add-participation {cup} {tournament} {player}';

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
        try {

            $cup = $this->findCup();
            $tournament = $this->findTournament($cup);
            $player = $this->findPlayer();

            $attributes = [
                'rank' => $this->ask('Rank ?'),
                'win' => $this->ask('Win ?'),
                'lose' => $this->ask('Lose ?'),
                'draw' => $this->ask('Draw ?'),
                'points' => $this->ask('Points ?'),
                'tournament_id' => $tournament->id,
            ];

            $this->itsNotDuplicate($player, $attributes);
            $this->rankIsFree($tournament, $attributes);
            $this->askforConfirmation($player, $attributes);

            app(ParticipationService::class)->store($player, $attributes);

            $this->info('done');

        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }

    protected function findCup(): Cup
    {
        $argument = $this->argument('cup');

        return Cup::where('slug', $argument)->firstOrFail();
    }

    protected function findTournament(Cup $cup): Tournament
    {
        $argument = $this->argument('tournament');

        return $cup->tournaments()->where('slug', $argument)->firstOrFail();
    }

    protected function findPlayer(): Player
    {
        $argument = $this->argument('player');

        return Player::where('name', $argument)->firstOrFail();
    }

    protected function itsNotDuplicate(Player $player, array $attributes)
    {
        $duplicate = $player->participations()->where('id', $attributes['tournament_id'])->count();

        if ($duplicate) {
            throw new Exception('duplicate participation');
        }
    }

    protected function rankIsFree(Tournament $tournament, array $attributes)
    {
        $duplicate = $tournament->participations()->where('rank', $attributes['rank'])->count();

        if ($duplicate) {
            throw new Exception('duplicate rank');
        }
    }

    protected function askforConfirmation(Player $player, array $attributes)
    {
        if (! $this->confirm('Do you wish to store?')) {
            throw new Exception('abort');
        }
    }
}

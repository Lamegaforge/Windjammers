<?php

namespace App\Console\Commands\Cups;

use Exception;
use App\Models\Cup;
use App\Models\Player;
use App\Models\Tournament;
use Illuminate\Console\Command;

class ManageCup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'manage-cup';

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
            
            $cup = $this->chooseCup();
            $tournament = $this->chooseTournament($cup);
            $state = $this->chooseState();

            $this->askforConfirmation($cup, $tournament, $state);

            $this->update($tournament, $state);

            $this->info('State is now ' . $state);

        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }

    protected function chooseCup(): Cup
    {
        $cups = Cup::all();

        $selectedCup = $this->choice(
            'Selection de la cup',
            $cups->pluck('slug')->toArray()
        );

        return $cups->where('slug', $selectedCup)->first();
    }

    protected function chooseTournament(Cup $cup): Tournament
    {
        $tournaments = $cup->tournaments;

        $selectedTournament = $this->choice(
            'Selection du tournoi',
            $tournaments->pluck('slug')->toArray()
        );

        return $tournaments->where('slug', $selectedTournament)->first();
    }

    protected function chooseState(): string
    {
        $state = $this->choice(
            'Modifier le state',
            ['open ', 'closed', 'finished']
        );

        return $state;
    }

    protected function update(Tournament $tournament, string $state): void
    {
       $tournament->update([
            'state' => $state,
        ]);
    }

    protected function askforConfirmation(Cup $cup, Tournament $tournament, string $state): void
    {
        $format = 'Modifier %s (%s) en %s ?';

        $message = sprintf($format, $tournament->slug, $cup->slug, $state);

        if (! $this->confirm($message)) {
            throw new Exception('abort');
        }
    }
}

<?php

namespace App\Services\Cups;

use App\Models\Cup;
use Illuminate\Support\Collection;

class LeaderboardService
{
    public function forge(Cup $cup): array
    {
        $tournaments = $this->retrieveTournaments($cup);

        $leaderboard = $cup->players->map(function ($player) use ($tournaments) {

            $participations = $this->retrieveParticipations($tournaments, $player);

            return collect([
                'name' => $player->name,
                'points' => $participations->sum('points'),
                'win' => $participations->sum('win'),
                'lose' => $participations->sum('lose'),
                'draw' => $participations->sum('draw'),
            ]);

        });

        return $leaderboard
            ->sortbydesc('points')
            ->values()
            ->toArray();
    }

    protected function retrieveTournaments(Cup $cup)
    {
        return $cup->tournaments()->where('state', 'finished')->get();
    }

    protected function retrieveParticipations($tournaments, $player)
    {
        return $tournaments->map(function ($tournament) use($player) {

            $participation = $tournament->participations->where('player_id', $player->id)->first();

            return $participation;
        });
    }
}

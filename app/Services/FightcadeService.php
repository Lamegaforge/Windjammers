<?php

namespace App\Services;

use Storage;

class FightcadeService
{
    public function compare(string $playerOne, string $playerTwo)
    {
        $history = app(FightcadeClient::class)->history($playerOne, $playerTwo);

        return $history 
            ->filter(function ($item) {
                return $item['gameid'] == 'wjammers';
            })
            ->filter(function ($item) {
                return $item['num_matches'] != 0;
            })
            ->values()
            ->map(function ($item) {

                $players = $item['players'];

                return [
                    'id' => $item['quarkid'],
                    'num_matches' => $item['num_matches'],
                    $players[0]['name'] => $players[0]['score'],
                    $players[1]['name'] => $players[1]['score'],
                ];
            });
    }

    public function store($players, $history): void
    {
        $this->storeSummary($history);
        $this->storePlayerOne($players[0], $history);
        $this->storePlayerTwo($players[1], $history);
    }

    protected function storeSummary($history): void
    {
        $num = $history->sum('num_matches');

        Storage::disk('players')->put('num_matches.txt', $num);
    }

    protected function storePlayerOne($player, $history): void
    {
        $this->storeImage('one', $player);

        $victory = $this->victory($player, $history);

        Storage::disk('players')->put('player_one_name.txt', $player['name']);
        Storage::disk('players')->put('player_one_victory.txt', $victory);
    }

    protected function storePlayerTwo($player, $history): void
    {
        $this->storeImage('two', $player);

        $victory = $this->victory($player, $history);

        Storage::disk('players')->put('player_two_name.txt', $player['name']);
        Storage::disk('players')->put('player_two_victory.txt', $victory);
    }

    protected function victory($player, $history): string
    {
        $matches = $history->sum('num_matches');

        if ($matches == 0) {
            return 'First match';
        }

        $sum = $history->sum($player['name']);

        $victory = round(($sum * 100) / $matches);

        return $sum . '(' . $victory . '%)';
    }

    protected function storeImage($name, $player): void
    {
        $file = file_get_contents($player['gravatar']);

        Storage::disk('players')->put('player_' . $name . '_avatar.png', $file);
    }
}

<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LeaderboardLine extends Component
{
    public $player;
    public $rank;

    public function __construct(array $player, int $rank)
    {
        $this->player = $player;
        $this->rank = $rank;
    }

    public function matchs(): int
    {
        return $this->player['win'] + $this->player['draw'] + $this->player['lose'];
    }

    public function ratio(): float
    {
        $win = $this->player['win'] ?: 1;
        $lose = $this->player['lose'] ?: 1;

        return $win / $lose;
    }

    public function rank(): int
    {
        return $this->rank + 1;
    }

    public function render()
    {
        return view('components.leaderboard_line');
    }
}

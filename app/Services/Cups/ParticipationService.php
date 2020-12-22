<?php

namespace App\Services\Cups;

use App\Models\Player;
use App\Models\Tournament;

class ParticipationService
{
    public function store(Player $player, array $attributes)
    {
        $player->participations()->create($attributes);
    }
}
                                                     
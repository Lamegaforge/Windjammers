<?php

namespace Database\Seeders;

use App\Models\Cup;
use App\Models\Player;
use App\Models\Tournament;
use Illuminate\Database\Seeder;

class WinterCup2021Seeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $cup = Cup::factory()->create([
            'name' => 'Winter Cup 2021',
            'slug' => 'wintercup2021',
        ]);

        Tournament::factory()->create([
            'name' => 'Tournoi de Janvier',
            'slug' => 'tournament_january',
            'challonge_url' => 'https://challonge.com/elr5nzzu',
            'cup_id' => $cup->id,
            'state' => 'open',
            'started_at' => '2021-01-10',
        ]);

        Tournament::factory()->create([
            'name' => 'Tournoi de Fevrier',
            'slug' => 'tournament_february',
            'challonge_url' => 'https://challonge.com/elr5nzzu',
            'cup_id' => $cup->id,
            'state' => 'open',
        ]);

        Tournament::factory()->create([
            'name' => 'Tournoi de Mars',
            'slug' => 'tournament_march',
            'challonge_url' => 'https://challonge.com/elr5nzzu',
            'cup_id' => $cup->id,
            'state' => 'open',
        ]);

        Player::factory()->create([
            'name' => 'Adwim',
            'cup_id' => $cup->id,
        ]);

        Player::factory()->create([
            'name' => 'Pyrotek',
            'cup_id' => $cup->id,
        ]);

        Player::factory()->create([
            'name' => 'Otherend',
            'cup_id' => $cup->id,
        ]);
    }
}

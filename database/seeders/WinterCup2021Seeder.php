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
            'name' => 'Tournament #1',
            'slug' => 'tournament_1',
            'challonge_url' => 'https://challonge.com/elr5nzzu',
            'cup_id' => $cup->id,
            'state' => 'finished',
            'start_time' => '2021-01-01',
        ]);

        Tournament::factory()->create([
            'name' => 'Tournament #2',
            'slug' => 'tournament_2',
            'challonge_url' => 'https://challonge.com/elr5nzzu',
            'cup_id' => $cup->id,
            'state' => 'closed',
            'start_time' => '2021-02-01',
        ]);

        Tournament::factory()->create([
            'name' => 'Tournament #3',
            'slug' => 'tournament_3',
            'challonge_url' => 'https://challonge.com/elr5nzzu',
            'cup_id' => $cup->id,
            'state' => 'open',
            'start_time' => '2021-03-01',
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

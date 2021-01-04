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
            'challonge_url' => 'https://windjammersfr.challonge.com/fr/winterleague1',
            'cup_id' => $cup->id,
            'state' => 'open',
            'started_at' => '2021-01-10 à 21:00 CET',
        ]);

        Tournament::factory()->create([
            'name' => 'Tournoi de Fevrier',
            'slug' => 'tournament_february',
            'challonge_url' => 'https://windjammersfr.challonge.com/fr/winterleague2',
            'cup_id' => $cup->id,
            'state' => 'open',
            'started_at' => '2021-02-07 à 21:00 CET',
        ]);

        Tournament::factory()->create([
            'name' => 'Tournoi de Mars',
            'slug' => 'tournament_march',
            'challonge_url' => 'https://windjammersfr.challonge.com/fr/winterleague3',
            'cup_id' => $cup->id,
            'state' => 'open',
            'started_at' => '2021-03-07 à 21:00 CET',
        ]);

        // Player::factory()->create([
        //     'name' => 'Adwim',
        //     'cup_id' => $cup->id,
        // ]);

        // Player::factory()->create([
        //     'name' => 'Pyrotek',
        //     'cup_id' => $cup->id,
        // ]);

        // Player::factory()->create([
        //     'name' => 'Otherend',
        //     'cup_id' => $cup->id,
        // ]);
    }
}

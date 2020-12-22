<?php

namespace Database\Seeders;

use App\Models\Cup;
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
            'cup_id' => $cup->id,
        ]);

        Tournament::factory()->create([
            'name' => 'Tournament #2',
            'slug' => 'tournament_2',
            'cup_id' => $cup->id,
        ]);

        Tournament::factory()->create([
            'name' => 'Tournament #3',
            'slug' => 'tournament_3',
            'cup_id' => $cup->id,
        ]);
    }
}

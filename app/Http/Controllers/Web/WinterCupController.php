<?php

namespace App\Http\Controllers\Web;

use View;
use App\Models\Cup;
use App\Models\Player;
use App\Models\Tournament;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Cups\LeaderboardService;

class WinterCupController extends Controller
{
    public function index(Request $request)
    {
        // $cup = Cup::where('slug', 'wintercup2021')->firstOrFail();

        // $tournaments = $cup->tournaments()
        //     ->orderBy('created_at')
        //     ->get();

        // $leaderboard = app(LeaderboardService::class)->forge($cup);

        $tournaments = [
            [
                'name' => 'Tournois #1',
                'registered' => 30,
                'start_time' => '2020-01-01',
                'challonge_url' => 'https://challonge.com/elr5nzzu',
                'state' => 'finished',
            ],
            [
                'name' => 'Tournois #2',
                'registered' => 25,
                'start_time' => '2020-02-01',
                'challonge_url' => 'https://challonge.com/elr5nzzu',
                'state' => 'open',
            ],
            [
                'name' => 'Tournois #3',
                'registered' => 17,
                'start_time' => '2020-03-01',
                'challonge_url' => 'https://challonge.com/elr5nzzu',
                'state' => 'open',
            ],
        ];



        $lideurborde = [
            [
                'rank' => 1,
                'change' => 1,
                'name' => 'Pyrotek',
                'matchs' => 3,
                'resume' => [
                    'win' => 2,
                    'lose' => 1,
                    'draw' => 0,
                ],
                'ratio' => 2,
                'points' => 6,
            ],
            [
                'rank' => 2,
                'change' => -1,
                'name' => 'Otherend',
                'matchs' => 3,
                'resume' => [
                    'win' => 2,
                    'lose' => 1,
                    'draw' => 0,
                ],
                'ratio' => 2,
                'points' => 6,
            ],
            [
                'rank' => 3,
                'change' => 0,
                'name' => 'Otherend',
                'matchs' => 3,
                'resume' => [
                    'win' => 2,
                    'lose' => 1,
                    'draw' => 0,
                ],
                'ratio' => 2,
                'points' => 6,
            ],
            [
                'rank' => 3,
                'change' => 0,
                'name' => 'Otherend',
                'matchs' => 3,
                'resume' => [
                    'win' => 2,
                    'lose' => 1,
                    'draw' => 0,
                ],
                'ratio' => 2,
                'points' => 6,
            ],
            [
                'rank' => 3,
                'change' => 0,
                'name' => 'Otherend',
                'matchs' => 3,
                'resume' => [
                    'win' => 2,
                    'lose' => 1,
                    'draw' => 0,
                ],
                'ratio' => 2,
                'points' => 6,
            ],
        ];

        return View::make('wintercups.2021', [
            'tournaments' => $tournaments,
            'lideurborde' => $lideurborde,
        ]);
    }
}

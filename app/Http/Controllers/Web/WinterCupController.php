<?php

namespace App\Http\Controllers\Web;

use View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WinterCupController extends Controller
{
    public function index(Request $request)
    {
        $tournaments = [
            [
                'name' => 'Tournois #1',
                'registered' => 10,
                'start_time' => '2020-01-01',
                'challonge_url' => 'https://challonge.com/elr5nzzu',
                'state' => 'open', // closed, finished
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
        ];

        return View::make('wintercups.2021', [
            'tournaments' => $tournaments,
            'lideurborde' => $lideurborde,
        ]);
    }
}

<?php

namespace App\Http\Controllers\Web;

use View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PickersController extends Controller
{
    public function stage()
    {
        $stages = [
            [
                'name' => 'Beach',
                'src' => asset('images/stages/beach.gif')
            ],
            [
                'name' => 'Clay',
                'src' => asset('images/stages/clay.gif')
            ],
            [
                'name' => 'Concrete',
                'src' => asset('images/stages/concrete.gif')
            ],
            [
                'name' => 'Lawn',
                'src' => asset('images/stages/lawn.gif')
            ],
            [
                'name' => 'Stadium',
                'src' => asset('images/stages/stadium.gif')
            ],
            [
                'name' => 'Tiled',
                'src' => asset('images/stages/tiled.gif')
            ]
        ];

        return View::make('pickers.stage', ['stages' => $stages]);
    }

    public function player()
    {
        $players = [
            [
                'name' => 'Mita',
                'src' => asset('images/players/mita.png')
            ],
            [
                'name' => 'Miller',
                'src' => asset('images/players/miller.png')
            ],
            [
                'name' => 'Costa',
                'src' => asset('images/players/costa.png')
            ],
            [
                'name' => 'Biaggi',
                'src' => asset('images/players/biaggi.png')
            ],
            [
                'name' => 'Scott',
                'src' => asset('images/players/scott.png')
            ],
            [
                'name' => 'Wessel',
                'src' => asset('images/players/wessel.png')
            ]
        ];

        return View::make('pickers.player', ['players' => $players]);
    }

    public function stageAndPlayer(Request $request)
    {
        $players = [
            [
                'name' => 'Mita',
                'src' => asset('images/players/mita.png')
            ],
            [
                'name' => 'Miller',
                'src' => asset('images/players/miller.png')
            ],
            [
                'name' => 'Costa',
                'src' => asset('images/players/costa.png')
            ],
            [
                'name' => 'Biaggi',
                'src' => asset('images/players/biaggi.png')
            ],
            [
                'name' => 'Scott',
                'src' => asset('images/players/scott.png')
            ],
            [
                'name' => 'Wessel',
                'src' => asset('images/players/wessel.png')
            ]
        ];

        $stages = [
            [
                'name' => 'Beach',
                'src' => asset('images/stages/beach.gif')
            ],
            [
                'name' => 'Clay',
                'src' => asset('images/stages/clay.gif')
            ],
            [
                'name' => 'Concrete',
                'src' => asset('images/stages/concrete.gif')
            ],
            [
                'name' => 'Lawn',
                'src' => asset('images/stages/lawn.gif')
            ],
            [
                'name' => 'Stadium',
                'src' => asset('images/stages/stadium.gif')
            ],
            [
                'name' => 'Tiled',
                'src' => asset('images/stages/tiled.gif')
            ]
        ];

        $constraints = [
            'Normal.',
            'Character obligatoire.',
            'Character interdit.',
            'Stage obligatoire.',
            'Stage interdit.',
            'Stage & character interdit.',
            'Stage & character obligatoire.',
        ];

        return View::make('pickers.stage_player', [
            'stages' => $stages, 
            'players' => $players,
            'constraints' => $constraints,
        ]);
    }
}

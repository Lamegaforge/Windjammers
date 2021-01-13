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
        $cup = Cup::where('slug', 'wintercup2021')->firstOrFail();

        $tournaments = $cup->tournaments()
            ->orderBy('created_at')
            ->get();

        $leaderboard = app(LeaderboardService::class)->forge($cup);

        return View::make('wintercups.2021', [
            'tournaments' => $tournaments->toArray(),
            'lideurborde' => $leaderboard,
        ]);
    }
}

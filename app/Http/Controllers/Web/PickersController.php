<?php

namespace App\Http\Controllers\Web;

use View;
use App\Http\Controllers\Controller;

class PickersController extends Controller
{
    public function stage()
    {
        return View::make('pickers.stage');
    }

    public function player()
    {
        return View::make('pickers.player');
    }
}

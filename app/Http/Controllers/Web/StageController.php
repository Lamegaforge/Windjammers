<?php

namespace App\Http\Controllers\Web;

use View;
use App\Http\Controllers\Controller;

class StageController extends Controller
{
    public function index()
    {
        return View::make('stage.index');
    }
}

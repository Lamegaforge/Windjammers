<?php

namespace App\Http\Controllers\Web;

use View;
use Illuminate\Http\Request;
use App\Services\WikiService;
use App\Http\Controllers\Controller;

class WikiController extends Controller
{
    public function index(Request $request)
    {
        return View::make('wiki.index');
    }

    public function show(Request $request)
    {
        $view = app(WikiService::class)->resolve($request->slug);

        return View::make($view);
    }
}

<?php

namespace App\Http\Controllers\Web;

use View;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::displayable()
            ->localized()
            ->orderByDesc('published_at')
            ->limit(6)
            ->get();

        return View::make('home.index', [
            'posts' => $posts,
        ]);
    }
}

<?php

namespace App\Http\Controllers\Web;

use View;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::displayable()
            ->orderByDesc('published_at')
            ->limit(6)
            ->get();

        return View::make('home.index', [
            'posts' => $posts->toArray(),
        ]);
    }

    public function posts(Request $request)
    {
        $posts = Post::displayable()
            ->orderByDesc('published_at')
            ->paginate(6);

        return View::make('home.posts', [
            'post' => $post->toArray(),
        ]);
    }

    public function post(Request $request)
    {
        $post = Post::displayable()
            ->where('id', $request->hook)
            ->orWhere('slug', $request->hook)
            ->firstOrFail();

        return View::make('home.post', [
            'post' => $post->toArray(),
        ]);
    }
}

<?php

namespace App\Http\Controllers\Web;

use View;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::displayable()
            ->localized()
            ->orderByDesc('published_at')
            ->paginate(6);

        return View::make('home.posts', [
            'posts' => $posts,
        ]);
    }

    public function show(Request $request)
    {
        $post = Post::displayable()
            ->where('id', $request->hook)
            ->orWhere('slug', $request->hook)
            ->firstOrFail();

        return View::make('home.post', [
            'post' => $post,
        ]);
    }
}

<?php

namespace App\Http\Controllers\Web;

use View;
use Redirect;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Requests\TogglePostRequest;
use App\Http\Requests\UpdateThumbnailRequest;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::displayable()
            ->localized()
            ->orderByDesc('published_at')
            ->paginate(6);

        return View::make('posts.index', [
            'posts' => $posts,
        ]);
    }

    public function show(Request $request)
    {
        $post = Post::displayable()
            ->where('id', $request->hook)
            ->orWhere('slug', $request->hook)
            ->firstOrFail();

        return View::make('posts.show', [
            'post' => $post,
        ]);
    }

    public function markdown(Request $request)
    {
        $content = $request->content;

        return View::make('posts.markdown', [
            'content' => $content,
        ]);
    }

    public function preview(Request $request)
    {
        $post = Post::findOrFail($request->id);

        return View::make('posts.preview', [
            'post' => $post,
        ]);
    }

    public function list()
    {
        $posts = Post::orderByDesc('published_at')
            ->paginate(8);

        return View::make('posts.list', [
            'posts' => $posts,
        ]);
    }

    public function edit(Request $request)
    {
        $post = Post::findOrFail($request->id);

        return View::make('posts.edit', [
            'post' => $post,
        ]);
    }

    public function update(UpdatePostRequest $request)
    {
        $post = Post::findOrFail($request->id);

        $post->update($request->validated());

        return Redirect::back();
    }

    public function thumbnail(UpdateThumbnailRequest $request)
    {
        $post = Post::findOrFail($request->id);

        $thumbnail = $request->file('thumbnail')->store($path = null, $disk = 'thumbnails');

        $post->update([
           'thumbnail' => $thumbnail,
        ]);

        return Redirect::back();
    }
}

<?php

namespace App\View\Components;

use Carbon\Carbon;
use Illuminate\View\Component;
use App\Models\Post;

class PostCard extends Component
{
    /**
     * The post title.
     *
     * @var Post
     */
    public $post;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function date(): string
    {
        return Carbon::parse($this->post->published_at)->isoFormat('LL');
    }

    public function thumbnail(): string
    {
        return $this->post->thumbnail ?? asset('images/small_beach.jpg');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.post_card');
    }
}

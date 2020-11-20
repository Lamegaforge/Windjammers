<?php

namespace App\View\Components;

use Carbon\Carbon;
use Illuminate\View\Component;

class Post extends Component
{
    /**
     * The post title.
     *
     * @var string
     */
    public $title;

    /**
     * The post extract.
     *
     * @var string
     */
    public $extract;

    /**
     * The post date.
     *
     * @var string
     */
    public $date;

    /**
     * The post slug.
     *
     * @var string
     */
    public $slug;

    /**
     * The post cover.
     *
     * @var string
     */
    public $cover;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $title, string $extract, string $date, string $slug, string $cover)
    {
        $this->title = $title;
        $this->extract = $extract;
        $this->date = $date;
        $this->slug = $slug;
        $this->cover = $cover;
    }

    public function date(): string
    {
        return Carbon::parse($this->date)->isoFormat('LL');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.post');
    }
}

<?php

namespace App\View\Components;

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
    public function __construct(string $title, string $extract, string $date, string $cover)
    {
        $this->title = $title;
        $this->extract = $extract;
        $this->date = $date;
        $this->cover = $cover;
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

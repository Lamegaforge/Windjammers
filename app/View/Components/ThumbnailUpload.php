<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ThumbnailUpload extends Component
{
    /**
     *
     * @var String
     */
    public $currentSrc;

    /**
     *
     * @var String
     */
    public $url;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(String $currentSrc, String $url)
    {
        $this->currentSrc = $currentSrc;
        $this->url = $url;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.thumbnail_upload');
    }
}

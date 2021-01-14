<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MarkdownEditor extends Component
{
    /**
     * Mardown content.
     *
     * @var array
     */
    public $content;

    /**
     * Post id.
     *
     * @var string
     */
    public $previewUrl;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $content, string $previewUrl)
    {
        $this->content = $content;
        $this->previewUrl = $previewUrl;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.markdown_editor');
    }
}

<?php

namespace App\Markdown\Extensions\Iframe\Embeds;

use League\CommonMark\HtmlElement;
use App\Markdown\Extensions\Iframe\Contracts\Embed;

class Youtube implements Embed {

    public array $attributes;

    public function __construct(array $attributes) 
    {
        $this->attributes = $attributes;
    }

    public function render(): HtmlElement
    {
        return new HtmlElement('iframe', [
            'width' => $this->attributes['width'],
            'height' => $this->attributes['height'],
            'src' => $this->attributes['url'],
            'frameborder' => 0,
            'allowfullscreen' => true,
        ]);
    }
}

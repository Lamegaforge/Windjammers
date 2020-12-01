<?php

namespace App\Markdown\Extensions\Iframe\Embeds;

use App\Markdown\Extensions\Iframe\Contracts\Embed;

class Tweet implements Embed {

    public array $attributes;

    public function __construct(array $attributes) 
    {
        $this->attributes = $attributes;
    }

    public function render(): string
    {
        return '<blockquote class="twitter-tweet"><a href="' . $this->attributes['url'] . '"></a></blockquote>';
    }
}

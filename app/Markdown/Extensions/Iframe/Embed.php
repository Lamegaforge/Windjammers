<?php

namespace App\Markdown\Extensions\Iframe;

class Embed {

    public array $attributes;

    public function __construct(array $attributes) 
    {
        $this->attributes = $attributes;
    }

    public function url(): string 
    {
        return $this->attributes['url'];
    }

    public function width(): string 
    {
        return $this->attributes['width'];
    }

    public function height(): string 
    {
        return $this->attributes['height'];
    }
}

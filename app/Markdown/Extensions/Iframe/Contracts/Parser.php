<?php

namespace App\Markdown\Extensions\Iframe\Contracts;

interface Parser 
{
    public function parse(string $url): ?Embed;
}

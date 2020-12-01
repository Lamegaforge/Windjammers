<?php

namespace App\Markdown\Extensions\Iframe;

use App\Markdown\Extensions\Iframe\Contracts\Embed;
use League\CommonMark\Inline\Element\AbstractInline;

class Iframe extends AbstractInline 
{
    public $embed;

    public function __construct(Embed $embed) 
    {
        $this->embed = $embed;
    }
}

<?php

namespace App\Markdown\Extensions\Iframe;

use League\CommonMark\HtmlElement;
use League\CommonMark\ElementRendererInterface;
use League\CommonMark\Inline\Element\AbstractInline;
use League\CommonMark\Inline\Renderer\InlineRendererInterface;

class IframeRenderer implements InlineRendererInterface 
{
    public function render(AbstractInline $inline, ElementRendererInterface $htmlRenderer)
    {
        return $inline->embed->render();
    }
}

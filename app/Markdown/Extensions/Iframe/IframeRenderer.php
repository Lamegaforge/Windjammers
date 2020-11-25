<?php

namespace App\Markdown\Extensions\Iframe;

use League\CommonMark\HtmlElement;
use League\CommonMark\ElementRendererInterface;
use League\CommonMark\Inline\Element\AbstractInline;
use League\CommonMark\Inline\Renderer\InlineRendererInterface;

class IframeRenderer implements InlineRendererInterface 
{
    public function render(AbstractInline $inline, ElementRendererInterface $htmlRenderer): HtmlElement
    {
        return new HtmlElement('iframe', [
            'width' => $inline->embed->width(),
            'height' => $inline->embed->height(),
            'src' => $inline->embed->url(),
            'frameborder' => 0,
            'allowfullscreen' => true,
        ]);
    }
}

<?php

namespace App\Markdown\Extensions\Iframe;

use App\Markdown\Extensions\Iframe\Parsers;
use League\CommonMark\Event\DocumentParsedEvent;
use League\CommonMark\Extension\ExtensionInterface;
use League\CommonMark\ConfigurableEnvironmentInterface;

class IframeExtension implements ExtensionInterface 
{
    public function register(ConfigurableEnvironmentInterface $environment) 
    {
        $environment
            ->addEventListener(DocumentParsedEvent::class, new IframeProcessor([
                new Parsers\Youtube(),
                new Parsers\Tweet(),
            ]))
            ->addInlineRenderer(Iframe::class, new IframeRenderer());
    }
}

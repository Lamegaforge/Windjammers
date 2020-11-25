<?php

namespace App\Markdown\Extensions\Iframe;

use League\CommonMark\Inline\Element\Link;
use League\CommonMark\Event\DocumentParsedEvent;
use App\Markdown\Extensions\Iframe\Parsers\Youtube;
use App\Markdown\Extensions\Iframe\Contracts\Parser;

class IframeProcessor {

    protected $parsers = [];

    public function __construct(array $parsers) 
    {
        $this->parsers = $parsers;
    }

    public function __invoke(DocumentParsedEvent $event) 
    {
        $walker = $event->getDocument()->walker();

        while ($event = $walker->next()) {

            if ($this->expectedNode($event)) {

                $link = $event->getNode();

                foreach ($this->parsers as $parser) {

                    if (! $parser instanceof Parser) {
                        continue;
                    }

                    $url = $parser->parse($link->getUrl());

                    if ($url === null) {
                        continue;
                    }
                    
                    $link->replaceWith(new Iframe($url));
                }
            }
        }
    }

    protected function expectedNode($event): bool
    {
        $node = $event->getNode();

        return $node instanceof Link && ! $event->isEntering();
    }
}

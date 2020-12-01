<?php

namespace App\Markdown\Extensions\Iframe\Parsers;

use App\Markdown\Extensions\Iframe\Embeds;
use App\Markdown\Extensions\Iframe\UrlInterface;
use App\Markdown\Extensions\Iframe\Contracts\Embed;
use App\Markdown\Extensions\Iframe\Contracts\Parser;
use App\Markdown\Extensions\Iframe\UrlParserInterface;

class Tweet implements Parser 
{
    public function parse(string $url): ?Embed
    {
        if ($this->doNotMatch($url)) {
            return null;
        }

        $arguments = $this->getArguments($url);

        $attributes = [
            'url' => $url,
            'width' => $arguments['width'] ?? 600,
            'height' => $arguments['height'] ?? 550,
        ];

        return new Embeds\Tweet($attributes);
    }

    protected function doNotMatch(string $url): string
    {
    	return ! preg_match('#.*twitter.com/.*/status/.*#', $url, $matchs);
    }

    protected function getArguments(string $url): array
    {
        $query = parse_url($url, PHP_URL_QUERY);

        parse_str((string) $query, $arguments);

        return $arguments;
    }
}

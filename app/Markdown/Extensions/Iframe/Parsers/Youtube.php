<?php

namespace App\Markdown\Extensions\Iframe\Parsers;

use App\Markdown\Extensions\Iframe\Embed;
use App\Markdown\Extensions\Iframe\UrlInterface;
use App\Markdown\Extensions\Iframe\Contracts\Parser;
use App\Markdown\Extensions\Iframe\UrlParserInterface;

class Youtube implements Parser 
{
    /**
     * @param string $url
     * @return YouTubeUrlInterface|null
     */
    public function parse(string $url): ?Embed
    {
        if ($this->doNotMatch($url)) {
            return null;
        }

        $arguments = $this->getArguments($url);

        $attributes = [
            'url' => $url,
            'width' => $arguments['width'] ?? 560,
            'height' => $arguments['height'] ?? 315,
        ];
        return new Embed($attributes);
    }

    protected function doNotMatch($url): bool
    {
        return ! preg_match('#.*youtube.com/embed/.*#', $url, $matchs);
    }

    protected function getArguments(string $url): array
    {
        $query = parse_url($url, PHP_URL_QUERY);

        parse_str((string) $query, $arguments);

        return $arguments;
    }
}

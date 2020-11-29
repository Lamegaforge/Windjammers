<?php

namespace App\Services;

use App;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class WikiService
{
    protected $config;

    public function __construct(array $config)
    {
        $this->config = collect($config);
    }

    public function resolve(string $slug): string
    {
        $expected = $this->config->has($slug);

        throw_unless($expected, NotFoundHttpException::class);

        $pages = $this->config->get($slug);

        return $pages[App::getLocale()];
    }
}

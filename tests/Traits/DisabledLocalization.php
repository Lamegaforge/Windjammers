<?php

namespace Tests\Traits;

use Mcamara\LaravelLocalization\Middleware\LocaleSessionRedirect;
use Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRoutes;
use Mcamara\LaravelLocalization\Middleware\LaravelLocalizationViewPath;

trait DisabledLocalization
{
    public function disabledLocalization(): void
    {
        $this->withoutMiddleware(LaravelLocalizationRoutes::class);
        $this->withoutMiddleware(LocaleSessionRedirect::class);
        $this->withoutMiddleware(LaravelLocalizationViewPath::class);
    }
}

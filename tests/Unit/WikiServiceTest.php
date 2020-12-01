<?php

namespace Tests\Unit;

use App;
use Tests\TestCase;
use App\Services\WikiService;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class WikiServiceTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     * @dataProvider dataProvider
     */
    public function resolve(string $lang, string $expected)
    {
        App::setLocale($lang);

        $view = app(WikiService::class)->resolve('beach');

        $this->assertEquals($view, $expected);
    }

    /**
     * @dataProvider 
     */
    public function dataProvider()
    {
        return [
            ['fr', 'wiki.pages.stages.fr.beach'],
            ['en', 'wiki.pages.stages.en.beach'],
        ];
    }

    /**
     * @test
     */
    public function unexpected()
    {
        $this->expectException(NotFoundHttpException::class);

        app(WikiService::class)->resolve('unexpected');
    }
}

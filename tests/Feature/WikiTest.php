<?php

namespace Tests\Feature;

use Tests\TestCase;
use Tests\Traits\DisabledLocalization;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class WikiTest extends TestCase
{
    use DatabaseMigrations, DisabledLocalization;

    /**
     * @test
     * @dataProvider dataProvider
     */
    public function page(string $url)
    {
        $response = $this->get($url);

        $response->assertStatus(200);
    }

    /**
     * @dataProvider 
     */
    public function dataProvider(): array
    {
        return [
            ['wiki'],
            ['wiki/home'],
            ['wiki/basic'],
            ['wiki/faq'],
            ['wiki/subtelties'],
            ['wiki/mita'],
            ['wiki/miller'],
            ['wiki/costa'],
            ['wiki/biaggi'],
            ['wiki/scott'],
            ['wiki/wessel'],
            ['wiki/beach'],
            ['wiki/clay'],
            ['wiki/concrete'],
            ['wiki/lawn'],
            ['wiki/tiled'],
            ['wiki/stadium'],
        ];
    }
}

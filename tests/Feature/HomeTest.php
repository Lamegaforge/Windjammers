<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Post;
use Tests\Traits\DisabledLocalization;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class HomeTest extends TestCase
{
    use DatabaseMigrations, DisabledLocalization;

    /**
     * @test
     */
    public function home()
    {
        $response = $this->get('/');

        $clips = Post::factory()->count(6)->create();

        $response
            ->assertStatus(200)
            ->assertSee('Dernières actualités');
    }
}

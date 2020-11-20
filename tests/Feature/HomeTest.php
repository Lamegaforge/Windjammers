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
        $clips = Post::factory()->count(6)->create();

        $response = $this->get('/');

        $response
            ->assertStatus(200)
            ->assertSee('Dernières actualités');
    }

    /**
     * @test
     */
    public function show_posts()
    {
        $clips = Post::factory()->count(6)->create();

        $response = $this->get('posts');

        $response
            ->assertStatus(200)
            ->assertSee('Toutes les actualités');
    }

    /**
     * @test
     */
    public function show_post()
    {
        $clip = Post::factory()->create();

        $response = $this->get('posts/' . $clip->slug);

        $response
            ->assertStatus(200);
    }
}

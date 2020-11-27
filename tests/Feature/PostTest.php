<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Post;
use App\Models\User;
use Tests\Traits\DisabledLocalization;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PostTest extends TestCase
{
    use DatabaseMigrations, DisabledLocalization;

    /**
     * @test
     */
    public function guest_cannot_update_post()
    {
        $post = Post::factory()->create();

        $response = $this->post('posts/' . $post->id . '/update');

        $response
            ->assertStatus(302)
            ->assertRedirect('auth/login');
    }

    /**
     * @test
     */
    public function auth_can_update_post()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create();

        $attributes = [
            'title' => 'Windjammers 2',
            'highlight' => 'blablabla',
            'content' => '#content',
            'language' => 'fr',
            'active' => true,
        ];

        $response = $this->actingAs($user)->post('posts/' . $post->id . '/update', $attributes);

        $response
            ->assertStatus(302)
            ->assertRedirect('/');

        $post->refresh();

        $this->assertEquals($post->title, $attributes['title']);
        $this->assertEquals($post->highlight, $attributes['highlight']);
        $this->assertEquals($post->content, $attributes['content']);
        $this->assertEquals($post->language, $attributes['language']);
        $this->assertEquals($post->active, $attributes['active']);
    }
}

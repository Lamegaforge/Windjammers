<?php

namespace Tests\Feature;

use Storage;
use Tests\TestCase;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\UploadedFile;
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
    public function guest_cannot_preview_post()
    {
        $post = Post::factory()->create();

        $response = $this->get('posts/' . $post->id . '/preview');

        $response
            ->assertStatus(302)
            ->assertRedirect('auth/login');
    }

    /**
     * @test
     */
    public function guest_cannot_list_posts()
    {
        $response = $this->get('posts/list');

        $response
            ->assertStatus(302)
            ->assertRedirect('auth/login');
    }


    /**
     * @test
     */
    public function guest_cannot_edit_post()
    {
        $post = Post::factory()->create();

        $response = $this->get('posts/' . $post->id . '/edit');

        $response
            ->assertStatus(302)
            ->assertRedirect('auth/login');
    }

    /**
     * @test
     */
    public function auth_can_preview_post()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create();

        $response = $this->actingAs($user)->get('posts/' . $post->id . '/preview');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function auth_can_edit_post()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create();

        $response = $this->actingAs($user)->get('posts/' . $post->id . '/edit');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function auth_can_list_posts()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('posts/list');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function auth_can_create_post()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('posts/create');

        $response
            ->assertStatus(302)
            ->assertRedirect('posts/1/edit');
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
            ->assertRedirect('posts/1/edit');

        $post->refresh();

        $this->assertEquals($post->title, $attributes['title']);
        $this->assertEquals($post->highlight, $attributes['highlight']);
        $this->assertEquals($post->content, $attributes['content']);
        $this->assertEquals($post->language, $attributes['language']);
        $this->assertEquals($post->active, $attributes['active']);
    }

    /**
     * @test
     */
    public function auth_can_update_thumbnail()
    {
        Storage::fake('thumbnails');

        $thumbnail = UploadedFile::fake()->image('thumbnail.jpg');

        $user = User::factory()->create();
        $post = Post::factory()->create();

        $response = $this->actingAs($user)->post('posts/' . $post->id . '/thumbnail', [
            'thumbnail' => $thumbnail,
        ]);

        $response
            ->assertStatus(302)
            ->assertRedirect('/');

        $post->refresh();

        Storage::disk('thumbnails')->assertExists($thumbnail->hashName());

        $this->assertEquals($post->thumbnail, $thumbnail->hashName());
    }


    /**
     * @test
     */
    public function auth_can_delete_post()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create();

        $response = $this->actingAs($user)->get('posts/' . $post->id . '/delete');

        $response
            ->assertStatus(302)
            ->assertSessionHas('message', 'Post "' . $post->title . '" deleted.');
    }
}

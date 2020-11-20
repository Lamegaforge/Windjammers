<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Post;
use App\Models\User;
use Tests\Traits\DisabledLocalization;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AuthTest extends TestCase
{
    use DatabaseMigrations, DisabledLocalization;

    /**
     * @test
     */
    public function guest_can_get_login()
    {
        $response = $this->get('auth/login');

        $response
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function auth_cannot_get_login()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('auth/login');

        $response
            ->assertStatus(302)
            ->assertRedirect('/');
    }

    /**
     * @test
     */
    public function guest_can_post_invalid_attempt()
    {
        $response = $this->post('auth/attempt', [
            'email' => 'invalid email',
            'password' => 'password',
        ]);

        $response->assertStatus(302);
    }

    /**
     * @test
     */
    public function guest_can_post_valid_attempt()
    {
        $user = User::factory()->create();

        $response = $this->post('auth/attempt', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response->assertStatus(302);

        $this->assertAuthenticatedAs($user);
    }

    /**
     * @test
     */
    public function auth_cannot_post_attempt()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('auth/attempt');

        $response
            ->assertStatus(302)
            ->assertRedirect('/');
    }
}

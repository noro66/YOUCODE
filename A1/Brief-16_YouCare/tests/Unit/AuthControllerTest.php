<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_with_valid_credentials()
    {
        $user = User::create(['name' => 'user','email' => 'user@gamil.com','password' => bcrypt('password')]);
        $credentials = ['email' => $user->email, 'password' => 'password'];

        $response = $this->postJson('/api/auth/login', $credentials);

        $response->assertStatus(200)
            ->assertJson(['status' => true]);
    }

    public function test_login_with_invalid_credentials()
    {
        $credentials = ['email' => 'nonexistent@example.com', 'password' => 'wrongpassword'];

        $response = $this->postJson('/api/auth/login', $credentials);

        $response->assertStatus(200)
            ->assertJson(['status' => false]);
    }

    public function test_register_new_user()
    {
        $userData = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'type' => 'volunteer'
        ];

        $response = $this->postJson('/api/auth/register', $userData);

        $response->assertStatus(200)
            ->assertJson(['status' => true]);
    }

    public function test_accessing_authenticated_routes_requires_authentication(): void
    {
        $response = $this->getJson('/api/auth/profile');

        $response->assertStatus(200)
            ->assertJson(['success' => false]);
    }

    public function test_accessing_authenticated_routes_after_login()
    {
        $user = User::factory()->create(['password' => bcrypt('password')]);
        $credentials = ['email' => $user->email, 'password' => 'password'];

        $this->postJson('/api/login', $credentials);

        $response = $this->getJson('/api/profile');

        $response->assertStatus(200)
            ->assertJson(['status' => true]);
    }

    public function test_logout()
    {
        $user = User::factory()->create(['password' => bcrypt('password')]);
        $credentials = ['email' => $user->email, 'password' => 'password'];

        $this->postJson('/api/login', $credentials);

        $response = $this->postJson('/api/logout');

        $response->assertStatus(200)
            ->assertJson(['status' => true]);
    }
}

<?php

namespace Tests\Feature;

use App\Models\Event;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class EventControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function authenticate()
    {
        // Creating a user and authenticate
        $user = User::create(['name' => 'user','email' => 'user@gamil.com','password' => bcrypt('password')]);
        $token = $user->createToken('TestToken')->plainTextToken;
        Auth::login($user);
        return $token;
    }

    public function test_index_returns_events()
    {
        Event::factory()->count(5)->create();

        $response = $this->getJson('/api/events');

        $response->assertStatus(200)
            ->assertJsonStructure(['events']);
    }

    public function test_store_creates_event()
    {
        $token = $this->authenticate();

        $eventData = Event::factory()->raw();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->postJson('/api/event', $eventData);

        $response->assertStatus(200)
            ->assertJson(['success' => true]);
    }

    public function test_show_returns_event()
    {
        $event = Event::factory()->create();

        $response = $this->getJson('/api/event/' . $event->id);

        $response->assertStatus(200)
            ->assertJson(['event' => $event]);
    }

    public function test_update_updates_event()
    {
        $token = $this->authenticate();

        $event = Event::factory()->create();
        $updatedData = ['title' => 'Updated Title'];

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->putJson('/api/events/' . $event->id, $updatedData);

        $response->assertStatus(200)
            ->assertJson(['success' => true]);

        $this->assertDatabaseHas('events', ['id' => $event->id, 'title' => 'Updated Title']);
    }

    public function test_destroy_deletes_event()
    {
        $token = $this->authenticate();

        $event = Event::factory()->create();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->deleteJson('/api/events/' . $event->id);

        $response->assertStatus(200)
            ->assertJson(['success' => true]);

        $this->assertDeleted($event);
    }
}

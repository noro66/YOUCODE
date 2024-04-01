<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\Organizer;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    protected $model = Event::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Get random organizer
        $organizer = Organizer::factory()->create();

        // Generate fake data
        return [
            'organizer_id' => $organizer->id,
            'title' => $this->faker->sentence,
            'type' => $this->faker->randomElement(['Conference', 'Seminar', 'Workshop']),
            'date' => $this->faker->dateTimeBetween('+1 week', '+1 year'),
            'location' => $this->faker->address,
            'description' => $this->faker->paragraph,
            'skills_required' => $this->faker->sentence,
        ];
    }
}

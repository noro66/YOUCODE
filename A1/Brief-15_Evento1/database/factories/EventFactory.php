<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Event;
use App\Models\Organizer;
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
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'date' => $this->faker->dateTimeBetween('now', '+1 year'),
            'added_by' => function () {
                return Organizer::factory()->create()->id;
            },
            'category_id' => function () {
                return Category::factory()->create()->id;
            },
            'Address' => $this->faker->address(),
            'poster_image' => 'eventImages/uCq4SzuwC1hArmwOzSXHbwUraLaNkjL7NUQfkucC.png',
            'seats' => 100,
            'available_seats' => 100,
            'status' => $this->faker->randomElement(['Pending', 'Approved']),
            'confirmation_type' => $this->faker->randomElement(['automatic', 'manually']),
        ];
    }
}

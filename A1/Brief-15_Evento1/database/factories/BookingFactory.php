<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\Event;
use App\Models\Participant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    protected $model = Booking::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'booked_by' => function () {
                return Participant::factory()->create()->id;
            },
            'event_id' => function () {
                return Event::factory()->create()->id;
            },
            'is_approved' => $this->faker->boolean(),
        ];
    }
}

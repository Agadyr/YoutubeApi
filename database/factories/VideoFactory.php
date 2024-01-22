<?php

namespace Database\Factories;

use App\Enums\Period;
use App\Models\Channel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Video>
 */
class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {


        return [
            'title' => ucfirst(fake()->words(mt_rand(1, 2), true)),
            'description' => fake()->sentences(mt_rand(1, 3), true),
            'channel_id' => Channel::factory(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */

    public function last(Period $period)
    {
        return $this->state(function () use ($period) {
            $createdAt = fake()->dateTimeBetween("-1 $period->value");

            return [
                'created_at' => $createdAt,
                'updated_at' => $createdAt,
            ];
        });
    }

    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}

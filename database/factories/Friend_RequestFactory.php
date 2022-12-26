<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Friend_Request>
 */
class Friend_RequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'sender_id' => fake()->numberBetween(1,10),
            'receiver_id' => fake()->numberBetween(1,10),
            'accepted' => fake()->boolean()
        ];
    }
}

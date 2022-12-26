<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->unique()->sentence(),
            'content' => fake()->text(),
            'image' => fake()->unique()->imageUrl(640,480),
            'read_count' => fake()->numberBetween(1,10),
            'user_id' => fake()->numberBetween(1,10),
        ];
    }
}

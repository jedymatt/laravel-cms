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
            'title' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'content' => $this->faker->paragraph,
            'cover_image_url' => $this->faker->imageUrl,
            'published_at' => $this->faker->dateTimeBetween('-1 year', '+1 year'),
            'user_id' => function () {
                return \App\Models\User::factory()->create()->id;
            },
        ];
    }
}

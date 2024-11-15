<?php

namespace Database\Factories;

use App\Models\Categories;
use App\Models\User;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;
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
    public function definition(): array
    {
        return [
            'id' => Uuid::uuid4(),
            'title' => fake()->sentence(),
            'author_id' => User::factory(),
            'category_id' => Categories::factory(),
            'slug' => Str::slug(fake()->sentence()),
            'body' => fake()->paragraph(30),
        ];
    }
}

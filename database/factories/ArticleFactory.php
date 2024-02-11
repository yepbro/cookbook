<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Article>
 */
class ArticleFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'author_id' => User::factory(),
            'heading' => fake()->sentence(),
            'slug' => fake()->unique()->slug(),
            'content' => fake()->paragraph(),
            'is_published' => fake()->boolean(80),
        ];
    }
}

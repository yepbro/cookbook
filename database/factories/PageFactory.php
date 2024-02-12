<?php

namespace Database\Factories;

use App\Models\Page;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Page>
 */
class PageFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => trim(fake()->sentence(2), '.'),
            'slug' => fake()->unique()->slug(),
            'content' => fake()->paragraph(),
            'is_published' => fake()->boolean(80),
            'show_in_menu' => fake()->boolean(80),
        ];
    }
}

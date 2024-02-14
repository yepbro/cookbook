<?php

namespace Database\Factories;

use App\Models\SeoData;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends Factory<SeoData>
 */
class SeoDataFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->optional()->sentence(),
            'header' => fake()->optional()->sentence(),
            'canonical' => null,
            'keywords' => implode(', ', Arr::wrap(fake()->optional()->words())),
            'description' => fake()->optional()->sentence(),
            'noindex' => fake()->boolean(),
            'nofollow' => fake()->boolean(),
            'text_before' => fake()->optional()->sentence(),
            'text_after' => fake()->optional()->sentence(),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Enums\MetaTagType;
use App\Models\MetaTag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<MetaTag>
 */
class MetaTagFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => fake()->randomElement(MetaTagType::cases())->value,
            'name' => fake()->word(),
            'content' => fake()->optional()->numberBetween(1, 2000),
        ];
    }
}

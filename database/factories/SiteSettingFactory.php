<?php

namespace Database\Factories;

use App\Models\SiteSetting;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<SiteSetting>
 */
class SiteSettingFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->words(2, true),
            'key' => fake()->unique()->slug(1),
            'value' => fake()->optional(0.8)->numberBetween(1, 1000),
            'description' => fake()->sentence(),
        ];
    }
}

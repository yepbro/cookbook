<?php

namespace Database\Factories;

use App\Models\SystemPage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<SystemPage>
 */
class SystemPageFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'slug' => fake()->unique()->slug(),
        ];
    }
}

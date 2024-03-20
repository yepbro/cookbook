<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Tag>
 */
class TagFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tag = fake()->unique()->word();

        return [
            'name' => $tag,
            'slug' => Str::of($tag)->slug()->toString(),
            'color' => fake()->optional(0.9)->hexColor(),
        ];
    }
}

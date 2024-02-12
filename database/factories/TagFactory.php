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
            'class' => fake()->optional(0.9)->randomElement([
                'bg-red-200',
                'bg-orange-200',
                'bg-amber-200',
                'bg-lime-200',
                'bg-green2-200',
                'bg-cyan-200',
                'bg-violet-200',
                'bg-pink-200',
            ]),
        ];
    }
}

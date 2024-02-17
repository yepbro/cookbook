<?php

namespace Database\Factories;

use App\Models\MetaTag;
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

            'og_off' => fake()->boolean(),
            'og_title' => fake()->optional()->sentence(),
            'og_type' => null,
            'og_url' => fake()->optional()->url(),
            'og_image' => fake()->optional()->imageUrl(),
            'og_description' => fake()->optional()->sentence(),
            'og_site_name' => fake()->optional()->city(),
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (SeoData $seoData) {
            MetaTag::factory()->count(3)->create([
                'seo_data_id' => $seoData->id,
            ]);
        });
    }

    public function article(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'og_type' => 'article',
            ];
        });
    }

    public function website(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'og_type' => 'website',
            ];
        });
    }
}

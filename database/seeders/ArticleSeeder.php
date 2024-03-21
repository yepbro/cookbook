<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\MoonshineUser;
use App\Models\SeoData;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $authors = MoonshineUser::all();

        $tags = Tag::all();

        Article::withoutSyncingToSearch(static function () use ($authors, $tags) {
            Article::factory()
                ->count(50)
                ->state(new Sequence(
                    fn (Sequence $sequence) => ['author_id' => $authors->random()],
                ))
                ->has(SeoData::factory(), 'seo')
                ->create()
                ->each(fn (Article $article) => $article->tags()->attach($tags->random(3)));
        });
    }
}

<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\SeoData;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $authors = User::all();

        $tags = Tag::all();

        Article::factory()
            ->count(50)
            ->state(new Sequence(
                fn (Sequence $sequence) => ['author_id' => $authors->random()],
            ))
            ->has(SeoData::factory(), 'seo')
            ->create()
            ->each(fn (Article $article) => $article->tags()->attach($tags->random(3)));
    }
}

<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $authors = User::all();

        Article::factory()
            ->count(50)
            ->state(new Sequence(
                fn(Sequence $sequence) => ['author_id' => $authors->random()],
            ))
            ->create();
    }
}

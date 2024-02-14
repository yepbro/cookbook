<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\SeoData;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        Page::factory()
            ->count(4)
            ->has(SeoData::factory(), 'seo')
            ->create();
    }
}

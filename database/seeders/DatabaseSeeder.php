<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Artisan::call('scout:delete-all-indexes');
        Artisan::call('scout:index', [
            'name' => (new Article)->searchableAs(),
        ]);
        Artisan::call('scout:sync-index-settings');

        Artisan::call('moonshine:user', [
            '--username' => 'denis@yepbro.ru',
            '--name' => 'Denis',
            '--password' => 'password',
        ]);

        $this->call([
            SiteSettingSeeder::class,
            SystemPageSeeder::class,
            PageSeeder::class,
            AuthorSeeder::class,
            UserSeeder::class,
            TagSeeder::class,
            ArticleSeeder::class,
        ]);

        Artisan::call('scout:import', [
            'model' => Article::class,
        ]);
    }
}

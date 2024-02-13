<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Artisan::call('moonshine:user', [
            '--username' => 'denis@yepbro.ru',
            '--name' => 'Denis',
            '--password' => 'password',
        ]);

        $this->call([
            SiteSettingSeeder::class,
            PageSeeder::class,
            UserSeeder::class,
            TagSeeder::class,
            ArticleSeeder::class,
        ]);
    }
}

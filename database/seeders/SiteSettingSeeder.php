<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        Artisan::call('deploy:fill-site-settings');
    }
}

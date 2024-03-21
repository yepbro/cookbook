<?php

namespace Database\Seeders;

use App\Models\MoonshineUser;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        MoonshineUser::factory()
            ->count(5)
            ->create();
    }
}

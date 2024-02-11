<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()
            ->create([
                'email' => 'denis@yepbro.ru',
                'name' => 'Denis',
            ]);

        User::factory()
            ->count(3)
            ->create();
    }
}

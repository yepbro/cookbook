<?php

namespace App\Models;

use Database\Factories\MoonshineUserFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MoonshineUser extends \MoonShine\Models\MoonshineUser
{
    use HasFactory;

    protected static function newFactory(): Factory
    {
        return MoonshineUserFactory::new();
    }
}

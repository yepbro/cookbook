<?php

namespace App\Providers;

use App\Models\SiteSetting;
use App\Services\SiteSettingService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(SiteSettingService::class, fn() => new SiteSettingService(SiteSetting::all()));
    }

    public function boot(): void
    {
        Model::shouldBeStrict();
    }
}

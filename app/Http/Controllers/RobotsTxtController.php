<?php

namespace App\Http\Controllers;

use App\Enums\SiteSettingKey;
use App\Services\SiteSettingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class RobotsTxtController extends Controller
{
    public function __invoke(Request $request, SiteSettingService $settings)
    {
        // TODO: сделать сброс кеша при обновление этого поля в админке
        return Cache::remember(SiteSettingKey::ROBOTSTXT->value, 24 * 60 * 60, function () use ($settings) {
            return $settings->getRobotsTxt();
        });
    }
}

<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

if (!function_exists('og_image')) {
    /**
     * Получить ссылку на изображение для OpenGraph,
     * если его нет, то сгенерировать
     */
    function og_image(string $url, ?string $browserShot): string
    {
        $path = parse_url($url)['path'] ?? '/';

        $ext = 'png';

        $filename = md5($path) . '.' . $ext;

        $filepath = Storage::disk('browsershots')->path($filename);

        Log::debug('X-Browser-Shot', Arr::wrap($browserShot));
        if (!file_exists($filepath) && $browserShot !== 'yes') {
            Artisan::queue('browsershot:make', [
                'url' => $url,
            ])->onQueue('commands');
        }

        return Storage::disk('browsershots')->url($filename);
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Spatie\Browsershot\Browsershot;
use Spatie\Browsershot\Exceptions\CouldNotTakeBrowsershot;

class MakeBrowserShot extends Command
{
    protected $signature = 'browsershot:make {url}';

    protected $description = 'Сделать скриншот в браузере';

    /**
     * @throws CouldNotTakeBrowsershot
     */
    public function handle(): void
    {
        $start = time();

        $url = $this->argument('url');

        $path = parse_url($url)['path'] ?? '/';

        $ext = 'png';

        $filepath = Storage::disk('browsershots')->path(md5($path).'.'.$ext);

        Browsershot::url($url)
            ->setExtraHttpHeaders([
                'X-Browser-Shot' => 'yes',
            ])
            ->waitUntilNetworkIdle()
            ->setScreenshotType($ext)
            ->windowSize(1200, 630)
            ->noSandbox()
            ->newHeadless()
            ->save($filepath);

        if (time() - $start > 5) {
            Log::warning(sprintf('MakeBrowserShot: %ss', time() - $start));
        }
    }
}

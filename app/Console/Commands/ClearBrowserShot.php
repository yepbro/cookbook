<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ClearBrowserShot extends Command
{
    protected $signature = 'browsershot:clear {--some}';

    protected $description = 'Очистка браузерных скриншотов страниц сайта для соц. сетей';

    public function handle(): void
    {
        $clearSome = $this->option('some');

        $clearSome
            ? $this->clearSome()
            : $this->clearAll();
    }

    /**
     * Удалить все
     */
    protected function clearAll(): void
    {
        $files = collect(Storage::disk('browsershots')->allFiles())
            ->reject(fn (string $file): bool => str_starts_with($file, '.'))
            ->toArray();

        Storage::disk('browsershots')->delete($files);
    }

    /**
     * Удалить только главную и страницы с пагинацией
     */
    protected function clearSome(): void
    {
        $files = [
            $this->getFileName(route('pages.home')),
            $this->getFileName(route('pages.tags.index')),
            $this->getFileName(route('pages.items.index')),
        ];

        Storage::disk('browsershots')->delete($files);
    }

    /**
     * Получить имя файла скриншота
     */
    protected function getFileName(string $url): string
    {
        $path = parse_url($url)['path'] ?? '/';

        return md5($path).'.png';
    }
}

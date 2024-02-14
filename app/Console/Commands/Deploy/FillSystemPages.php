<?php

namespace App\Console\Commands\Deploy;

use App\Enums\SystemPage as SystemPageEnum;
use App\Models\SystemPage;
use Illuminate\Console\Command;

class FillSystemPages extends Command
{
    protected $signature = 'deploy:fill-system-pages';

    protected $description = 'Обновить список системных страниц';

    public function handle(): void
    {
        foreach (SystemPageEnum::cases() as $item) {
            $page = SystemPage::firstOrCreate([
                'slug' => $item->value,
            ], [
                'name' => $item->name,
            ]);

            if ($page->wasRecentlyCreated) {
                $page->seo()->create();
            }
        }
    }
}

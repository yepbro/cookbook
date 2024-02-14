<?php

namespace App\Console\Commands\Deploy;

use App\Models\SiteSetting;
use Illuminate\Console\Command;

class FillSiteSettings extends Command
{
    protected $signature = 'deploy:fill-site-settings';

    protected $description = 'Добавить в базу стартовые данные для таблицы настроек сайта';

    public function handle(): void
    {
        foreach ($this->items as $item) {
            SiteSetting::updateOrCreate([
                'key' => $item['key'],
            ], $item);
        }
    }

    protected array $items = [
        [
            'name' => 'Код для добавления в head',
            'key' => 'head',
            'value' => null,
            'description' => null,
        ],
        [
            'name' => 'Код для добавления перед закрывающим тегом body',
            'key' => 'footer',
            'value' => null,
            'description' => null,
        ],
        [
            'name' => 'Robots.txt',
            'key' => 'robots.txt',
            'value' => "User-agent: *\nDisallow: /",
            'description' => null,
        ],
        [
            'name' => 'E-mail',
            'key' => 'email',
            'value' => null,
            'description' => null,
        ],
        [
            'name' => 'Логотип',
            'key' => 'logo',
            'value' => null,
            'description' => null,
        ],
    ];
}

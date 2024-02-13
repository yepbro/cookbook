<?php

namespace App\Console\Commands;

use App\Models\Article;
use App\Models\Page;
use App\Models\Tag;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap as SpatieSitemap;
use Spatie\Sitemap\Tags\Url;

class Sitemap extends Command
{
    protected $signature = 'app:sitemap';

    protected $description = 'Сгенерировать страницы для сайта';

    public function handle(): void
    {
        $lastArticle = Article::latest()->first();

        SpatieSitemap::create()
            ->add(Url::create(route('pages.home'))
                ->setLastModificationDate($lastArticle?->created_at ?: now())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setPriority(0.6))
            ->add(Url::create(route('pages.tags.index'))
                ->setLastModificationDate($lastArticle?->created_at ?: now())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setPriority(0.3))
            ->add(Url::create(route('pages.items.index'))
                ->setLastModificationDate($lastArticle?->created_at ?: now())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setPriority(0.5))
            ->add(Tag::has('articles')->get())
            ->add(Article::published()->get())
            ->add(Page::published()->get())
            ->writeToFile(public_path('sitemap.xml'));
    }
}

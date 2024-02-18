<?php

namespace App\Livewire\Pages;

use App\Enums\SystemPage as SystemPageEnum;
use App\Models\Article;
use App\Models\SeoData;
use App\Models\SystemPage;
use App\Services\SiteSettingService;
use Illuminate\Contracts\Foundation\Application as CApplication;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Application;
use Illuminate\Support\Collection as SCollection;
use Livewire\Component;

class Home extends Component
{
    protected SeoData $seo;

    /**
     * @var SCollection<int, Article>
     */
    public SCollection $topArticles;

    /**
     * @var Collection<int, Article>
     */
    public Collection $lastArticles;

    public function mount(): void
    {
        $this->seo = SystemPage::slug(SystemPageEnum::HOME)->first()->seo()->firstOrNew();

        $this->lastArticles = Article::published()->latest('id')->limit(5)->get();

        $this->topArticles = visits(Article::class)->top(10);
    }

    public function render(SiteSettingService $service): View|Application|Factory|CApplication
    {
        return view('livewire.pages.home', [
            'about' => $service->getMainAbout(),
        ])
            ->layoutData([
                'seo' => $this->seo,
            ]);
    }
}

<?php

namespace App\Livewire\Pages\Articles;

use App\Enums\SystemPage as SystemPageEnum;
use App\Models\Article;
use App\Models\SeoData;
use App\Models\SystemPage;
use Illuminate\Contracts\Foundation\Application as CApplication;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected SeoData $seo;

    public function mount(): void
    {
        $this->seo = SystemPage::slug(SystemPageEnum::ARTICLES)->first()->seo()->firstOrNew();
    }

    public function render(): View|Application|Factory|CApplication
    {
        return view('livewire.pages.articles.index', [
            'articles' => Article::with('tags')->published()->paginate(10),
        ])->layoutData([
            'header' => 'Все рецепты',
            'seo' => $this->seo ?? null,
        ]);
    }
}

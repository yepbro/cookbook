<?php

namespace App\Livewire\Pages\Tags;

use App\Enums\SystemPage as SystemPageEnum;
use App\Models\SeoData;
use App\Models\SystemPage;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application as CApplication;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Application;
use Livewire\Component;

class Index extends Component
{
    /**
     * @var Collection<int, Tag>
     */
    public Collection $tags;

    protected SeoData $seo;

    public function mount(): void
    {
        $this->seo = SystemPage::slug(SystemPageEnum::TAGS)->first()->seo()->firstOrNew();

        $this->tags = Tag::withCount('articles')
            ->has('articles')
            ->orderByDesc('articles_count')
            ->get();
    }

    public function render(): View|Application|Factory|CApplication
    {
        return view('livewire.pages.tags.index')
            ->layoutData([
                'header' => 'Все теги',
                'seo' => $this->seo,
            ]);
    }
}

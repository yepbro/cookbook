<?php

namespace App\Livewire\Pages;

use App\Enums\SystemPage as SystemPageEnum;
use App\Models\Article;
use App\Models\SeoData;
use App\Models\SystemPage;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application as CApplication;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Arr;
use Laravel\Scout\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class Search extends Component
{
    use WithPagination;

    public SeoData $seo;

    public $search = '';

    public $tagId = '';

    public function mount(): void
    {
        $this->seo = SystemPage::slug(SystemPageEnum::SEARCH)->first()->seo()->firstOrNew();
    }

    protected function queryString(): array
    {
        return [
            'search' => [
                'as' => 'q',
            ],
            'tagId' => [
                'as' => 'tag',
            ],
        ];
    }

    public function render(): View|Application|Factory|CApplication
    {
        return view('livewire.pages.search', [
            'tags' => $this->tagId ? Tag::whereIn('id', Arr::wrap($this->tagId))->get() : collect(),
            'articles' => Article::search($this->search)
                ->when($this->tagId, fn (Builder $query) => $query->whereIn('tags', Arr::wrap($this->tagId)))
                ->paginate(10),
        ])->layoutData([
            'header' => 'Результаты поиска',
            'seo' => $this->seo ?? null,
        ]);
    }
}

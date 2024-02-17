<?php

namespace App\Livewire\Pages;

use App\Enums\SystemPage as SystemPageEnum;
use App\Models\Article;
use App\Models\SeoData;
use App\Models\SystemPage;
use Illuminate\Contracts\Foundation\Application as CApplication;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Application;
use Livewire\Component;
use Livewire\WithPagination;

class Search extends Component
{
    use WithPagination;

    public SeoData $seo;

    public $search = '';

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
        ];
    }

    public function render(): View|Application|Factory|CApplication
    {
        return view('livewire.pages.search', [
            'articles' => Article::search($this->search)
                ->query(fn (Builder $query) => $query->with('tags'))
                ->paginate(10),
        ])->layoutData([
            'header' => 'Результаты поиска',
            'seo' => $this->seo ?? null,
        ]);
    }
}

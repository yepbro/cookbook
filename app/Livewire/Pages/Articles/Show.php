<?php

namespace App\Livewire\Pages\Articles;

use App\Models\Article;
use App\Models\SeoData;
use Illuminate\Contracts\Foundation\Application as CApplication;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Application;
use Livewire\Component;

class Show extends Component
{
    public Article $article;

    protected SeoData $seo;

    /**
     * @var Collection<int, Article>
     */
    public Collection $articles;

    public function mount(Article $article): void
    {
        abort_unless($article->is_published, 404);

        $this->article = $article->load('tags');

        $this->seo = $this->article->seo()->firstOrNew();

        $this->articles = Article::query()
            ->whereHas('tags', fn (Builder $query) => $query->whereIn('tags.id', $this->article->tags->pluck('id')->toArray()))
            ->take(5)
            ->inRandomOrder()
            ->get();

        $this->article->visit()->increment();
    }

    public function render(): View|Application|Factory|CApplication
    {
        return view('livewire.pages.articles.show')
            ->layoutData([
                'header' => $this->article->heading,
                'seo' => $this->seo,
            ]);
    }
}

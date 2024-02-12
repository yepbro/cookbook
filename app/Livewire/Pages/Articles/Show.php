<?php

namespace App\Livewire\Pages\Articles;

use App\Models\Article;
use Illuminate\Contracts\Foundation\Application as CApplication;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class Show extends Component
{
    public Article $article;

    public function mount(Article $article): void
    {
        abort_unless($article->is_published, 404);

        $this->article = $article->load('tags');
    }

    public function render(): View|Application|Factory|CApplication
    {
        return view('livewire.pages.articles.show')
            ->layoutData([
                'header' => $this->article->heading,
            ]);
    }
}

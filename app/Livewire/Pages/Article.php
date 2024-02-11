<?php

namespace App\Livewire\Pages;

use App\Models\Article as ArticleModel;
use Illuminate\Contracts\Foundation\Application as CApplication;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class Article extends Component
{
    public ArticleModel $article;

    public function mount(ArticleModel $article): void
    {
        abort_unless($article->is_published, 404);

        $this->article = $article->load('tags');
    }

    public function render(): View|Application|Factory|CApplication
    {
        return view('livewire.pages.article');
    }
}

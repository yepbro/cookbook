<?php

namespace App\Livewire\Pages\Articles;

use App\Models\Article;
use Illuminate\Contracts\Foundation\Application as CApplication;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class Index extends Component
{
    public function mount(): void
    {
        //
    }

    public function render(): View|Application|Factory|CApplication
    {
        return view('livewire.pages.articles.index', [
            'articles' => Article::with('tags')->get(),
        ]);
    }
}

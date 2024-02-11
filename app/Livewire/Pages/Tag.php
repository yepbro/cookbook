<?php

namespace App\Livewire\Pages;

use App\Models\Tag as TagModel;
use Illuminate\Contracts\Foundation\Application as CApplication;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class Tag extends Component
{
    public TagModel $tag;

    public function mount(TagModel $tag): void
    {
        $this->tag = $tag;
    }

    public function render(): View|Application|Factory|CApplication
    {
        return view('livewire.pages.tag', [
            'articles' => $this->tag->articles()->published()->get(),
        ]);
    }
}

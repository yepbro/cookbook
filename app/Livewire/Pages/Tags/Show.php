<?php

namespace App\Livewire\Pages\Tags;

use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application as CApplication;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class Show extends Component
{
    public Tag $tag;

    public function mount(Tag $tag): void
    {
        $this->tag = $tag;
    }

    public function render(): View|Application|Factory|CApplication
    {
        return view('livewire.pages.tags.show', [
            'articles' => $this->tag->articles()->published()->get(),
        ]);
    }
}

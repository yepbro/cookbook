<?php

namespace App\Livewire\Pages\Tags;

use App\Models\SeoData;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application as CApplication;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;

    public Tag $tag;

    protected SeoData $seo;

    public function mount(Tag $tag): void
    {
        $this->tag = $tag;

        $this->seo = $this->tag->seo()->firstOrNew();
    }

    public function render(): View|Application|Factory|CApplication
    {
        return view('livewire.pages.tags.show', [
            'articles' => $this->tag->articles()->with('tags')->published()->paginate(10),
        ])->layoutData([
            'header' => 'Тег '.$this->tag->name,
            'seo' => $this->seo,
        ]);
    }
}

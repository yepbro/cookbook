<?php

namespace App\Livewire\Pages\Tags;

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

    public function mount(): void
    {
        $this->tags = Tag::all();
    }

    public function render(): View|Application|Factory|CApplication
    {
        return view('livewire.pages.tags.index')->layoutData([
            'header' => 'Все теги',
        ]);
    }
}

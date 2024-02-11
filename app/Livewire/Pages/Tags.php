<?php

namespace App\Livewire\Pages;

use App\Models\Tag as TagModel;
use Illuminate\Contracts\Foundation\Application as CApplication;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Application;
use Livewire\Component;

class Tags extends Component
{
    /**
     * @var Collection<int, TagModel>
     */
    public Collection $tags;

    public function mount(): void
    {
        $this->tags = TagModel::all();
    }

    public function render(): View|Application|Factory|CApplication
    {
        return view('livewire.pages.tags');
    }
}

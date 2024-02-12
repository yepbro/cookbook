<?php

namespace App\Livewire\Pages;

use App\Models\Page as PageModel;
use Illuminate\Contracts\Foundation\Application as CApplication;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class Page extends Component
{
    public PageModel $page;

    public function mount(PageModel $page): void
    {
        abort_unless($page->is_published, 404);

        $this->page = $page;
    }

    public function render(): View|Application|Factory|CApplication
    {
        return view('livewire.pages.page')
            ->layoutData([
                'header' => $this->page->name,
            ]);
    }
}

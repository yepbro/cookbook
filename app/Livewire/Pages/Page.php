<?php

namespace App\Livewire\Pages;

use App\Models\Page as PageModel;
use App\Models\SeoData;
use Illuminate\Contracts\Foundation\Application as CApplication;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class Page extends Component
{
    public PageModel $page;

    protected SeoData $seo;

    public function mount(PageModel $page): void
    {
        abort_unless($page->is_published, 404);

        $this->page = $page;

        $this->seo = $this->page->seo()->firstOrNew();
    }

    public function render(): View|Application|Factory|CApplication
    {
        return view('livewire.pages.page')
            ->layoutData([
                'header' => $this->page->name,
                'seo' => $this->seo,
            ]);
    }
}

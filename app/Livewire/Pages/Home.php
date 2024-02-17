<?php

namespace App\Livewire\Pages;

use App\Enums\SystemPage as SystemPageEnum;
use App\Models\SeoData;
use App\Models\SystemPage;
use Illuminate\Contracts\Foundation\Application as CApplication;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class Home extends Component
{
    protected SeoData $seo;

    public function mount(): void
    {
        $this->seo = SystemPage::slug(SystemPageEnum::HOME)->first()->seo()->firstOrNew();
    }

    public function render(): View|Application|Factory|CApplication
    {
        return view('livewire.pages.home')
            ->layoutData([
                'header' => 'Главная страница',
                'seo' => $this->seo,
            ]);
    }
}

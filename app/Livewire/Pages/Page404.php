<?php

namespace App\Livewire\Pages;

use Illuminate\Contracts\Foundation\Application as CApplication;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class Page404 extends Component
{
    public function render(): View|Application|Factory|CApplication
    {
        return view('livewire.pages.404')
            ->layoutData([
                'header' => 'Страница не найдена',
            ]);
    }
}

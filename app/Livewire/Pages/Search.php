<?php

namespace App\Livewire\Pages;

use Illuminate\Contracts\Foundation\Application as CApplication;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class Search extends Component
{
    public function render(): View|Application|Factory|CApplication
    {
        return view('livewire.pages.search')->layoutData([
            'header' => 'Результаты поиска',
        ]);
    }
}

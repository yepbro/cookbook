<?php

namespace App\View\Components;

use App\Models\Page;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class BaseLayout extends Component
{
    public Collection $footerLinks;

    public function __construct(
        public string $header = '',
        public string $desc = '',
        public string $title = '',
    )
    {
        $this->footerLinks = Page::published()->inMenu()->select(['name', 'slug'])->get();
    }

    public function render()
    {
        return view('layouts.base');
    }
}

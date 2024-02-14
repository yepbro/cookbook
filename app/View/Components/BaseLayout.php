<?php

namespace App\View\Components;

use App\Models\Page;
use App\Models\SeoData;
use Closure;
use Illuminate\Contracts\Foundation\Application as ApplicationContract;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class BaseLayout extends Component
{
    public Collection $footerLinks;

    public function __construct(
        public string $header = '',
        public ?SeoData $seo = null,
    )
    {
        if ($seo === null) {
            $this->seo = new SeoData;
        }

        $this->footerLinks = Page::published()->inMenu()->select(['name', 'slug'])->get();
    }

    public function render(): Factory|Application|View|Htmlable|string|Closure|ApplicationContract
    {
        return view('layouts.base');
    }
}

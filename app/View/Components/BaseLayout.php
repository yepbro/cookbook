<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BaseLayout extends Component
{
    public function __construct(
        public string $header = '',
        public string $desc = '',
        public string $title = '',
    )
    {
        //
    }

    public function render()
    {
        return view('layouts.base');
    }
}

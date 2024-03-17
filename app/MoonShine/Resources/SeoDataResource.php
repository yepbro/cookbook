<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use MoonShine\Resources\Resource;

class SeoDataResource extends Resource
{
    public function pages(): array
    {
        return [
            //
        ];
    }

    protected function resolveRoutes(): void
    {
        parent::resolveRoutes();
    }
}

<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Page;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Fields\ID;
use MoonShine\Resources\ModelResource;

/**
 * @extends ModelResource<Page>
 */
class PageResource extends ModelResource
{
    protected string $model = Page::class;

    protected string $title = 'Страницы';

    public function indexFields(): array
    {
        return [
            ID::make()->sortable(),
        ];
    }

    public function formFields(): array
    {
        return [
            ID::make()->sortable(),
        ];
    }

    public function detailFields(): array
    {
        return [
            ID::make()->sortable(),
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }
}

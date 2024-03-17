<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Fields\ID;
use MoonShine\Resources\ModelResource;

/**
 * @extends ModelResource<Tag>
 */
class TagResource extends ModelResource
{
    protected string $model = Tag::class;

    protected string $title = 'Теги';

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

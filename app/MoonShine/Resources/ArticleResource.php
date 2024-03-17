<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Fields\ID;
use MoonShine\Resources\ModelResource;

/**
 * @extends ModelResource<Article>
 */
class ArticleResource extends ModelResource
{
    protected string $model = Article::class;

    protected string $title = 'Статьи';

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

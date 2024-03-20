<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Article;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Fields\Date;
use MoonShine\Fields\ID;
use MoonShine\Fields\Preview;
use MoonShine\Fields\Relationships\BelongsToMany;
use MoonShine\Fields\Text;
use MoonShine\QueryTags\QueryTag;
use MoonShine\Resources\ModelResource;

/**
 * @extends ModelResource<Article>
 */
class ArticleResource extends ModelResource
{
    protected string $model = Article::class;

    protected string $title = 'Статьи';

    protected array $with = [
        'author',
    ];

    public function queryTags(): array
    {
        return [
            QueryTag::make(
                'Активные',
                fn (Builder $query): Builder => $query->withoutTrashed()
            )->icon('heroicons.power')
                ->default(),
            QueryTag::make(
                'Удаленные',
                fn (Builder $query): Builder => $query->onlyTrashed()
            )->icon('heroicons.trash'),
        ];
    }

    public function indexFields(): array
    {
        return [
            ID::make()->sortable(),
            Text::make('Автор', 'author.name'),
            Text::make('Название', 'heading'),
            Preview::make('Опубликовано', 'is_published')->boolean(),
            BelongsToMany::make('Теги', 'tags', resource: new TagResource)
                ->inLine(' ', true),
            Date::make('Добавлено', 'created_at')
                ->format('d.m.Y'),
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

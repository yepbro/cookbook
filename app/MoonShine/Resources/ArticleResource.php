<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Article;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use MoonShine\Exceptions\FieldException;
use MoonShine\Fields\Date;
use MoonShine\Fields\ID;
use MoonShine\Fields\Preview;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Relationships\BelongsToMany;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Text;
use MoonShine\Fields\TinyMce;
use MoonShine\Fields\Url;
use MoonShine\QueryTags\QueryTag;
use MoonShine\Resources\ModelResource;

/**
 * @extends ModelResource<Article>
 */
class ArticleResource extends ModelResource
{
    protected string $model = Article::class;

    protected string $title = 'Статьи';

    protected string $column = 'heading';

    protected array $with = [
        'author',
    ];

    protected bool $detailInModal = true;

    public function queryTags(): array
    {
        return [
            QueryTag::make(
                'Активные',
                fn (Builder $query): Builder => $query->withoutTrashed(),
            )->icon('heroicons.power')
                ->default(),
            QueryTag::make(
                'Удаленные',
                fn (Builder $query): Builder => $query->onlyTrashed(),
            )->icon('heroicons.trash'),
        ];
    }

    /**
     * @throws FieldException
     */
    public function indexFields(): array
    {
        return [
            ID::make()->sortable(),
            BelongsTo::make('Автор', 'author', resource: new UserResource),
            Text::make('Название', 'heading'),
            Switcher::make('Опубликовано', 'is_published')->updateOnPreview(),
            BelongsToMany::make('Теги', 'tags', resource: new TagResource)->inLine(' ', true),
            Date::make('Добавлено', 'created_at')->format('d.m.Y'),
        ];
    }

    public function formFields(): array
    {
        return [
            BelongsTo::make('Автор', 'author', resource: new UserResource)->nullable(),
            Text::make('Название', 'heading'),
            Slug::make('Slug', 'slug')->from('heading')->unique(),
            Switcher::make('Опубликовано', 'is_published')->hideOnDetail(),
            TinyMce::make('Контент', 'content'),
            BelongsToMany::make('Теги', 'tags', resource: new TagResource)
                ->creatable()->selectMode(),
        ];
    }

    public function detailFields(): array
    {
        return [
            ID::make(),
            Date::make('Удалено', 'deleted_at')->hideOnDetail(fn (): bool => is_null($this->getItem()->deleted_at)),
            Url::make('Ссылка', formatted: fn (Article $item): string => route('pages.items.show', $item))->hideOnForm(),
            Preview::make('Автор', 'author.name'),
            Preview::make('Название', 'heading'),
            Preview::make('Опубликовано', 'is_published')->boolean()->hideOnForm(),
            TinyMce::make('Контент', 'content'),
        ];
    }

    public function rules(Model $item): array
    {
        return [
            'author_id' => 'required|integer|exists:moonshine_users,id',
            'heading' => 'required|string|min:8|max:80',
            'slug' => [
                'nullable',
                'string',
                'alpha_dash',
                'min:8',
                'max:80',
                Rule::unique('articles')->ignoreModel($item),
            ],
            'content' => 'nullable|string|max:20480',
            'is_published' => 'required|boolean',
        ];
    }

    protected function searchQuery(string $terms): void
    {
        // TODO: пробрасывать сюда все
        $this->getModel()
            ->search($terms)
            ->paginate(10);
    }
}

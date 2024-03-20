<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use MoonShine\Enums\PageType;
use MoonShine\Fields\ID;
use MoonShine\Fields\Preview;
use MoonShine\Fields\Relationships\HasMany;
use MoonShine\Fields\Text;
use MoonShine\QueryTags\QueryTag;
use MoonShine\Resources\ModelResource;

/**
 * @extends ModelResource<Tag>
 */
class TagResource extends ModelResource
{
    protected string $model = Tag::class;

    protected string $column = 'name';

    protected string $title = 'Теги';

    protected ?PageType $redirectAfterSave = PageType::INDEX;

    protected int $itemsPerPage = 100;

    protected array $with = [
        'articles', // TODO: нужно для вывода счетчика статей по тегу, при этом грузим все объекты статей
    ];

    public function getActiveActions(): array
    {
        return ['create', 'update', 'delete', 'massDelete'];
    }

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
            Text::make('Название', 'name')->sortable(),
            Text::make('Слаг', 'slug')->sortable(),
            Preview::make('Цвет', 'class'),
            HasMany::make('Статьи', 'articles', resource: new ArticleResource)
                ->onlyLink(),
        ];
    }

    public function formFields(): array
    {
        return [
            Text::make('Название', 'name'),
            Text::make('Слаг', 'slug')
                ->onApply(fn (Tag $item, ?string $value): Tag => $item->fill(['slug' => $this->prepareSlug($value, $item->name)]))
                ->hint('Если хотите что бы слаг автоматически сгенерировался на основе названия - оставьте поле пустым.'),
        ];
    }

    public function detailFields(): array
    {
        return [
            ID::make()->sortable(),
        ];
    }

    public function search(): array
    {
        return [
            'name',
            'slug',
        ];
    }

    protected function prepareSlug(?string $slug, ?string $name): ?string
    {
        if (empty($name)) {
            return null;
        }

        return $slug
            ? Str::of($slug)->lower()->toString()
            : Str::of($name)->transliterate()->lower()->slug()->toString();
    }

    public function prepareForValidation(): void
    {
        moonshineRequest()?->merge([
            'slug' => $this->prepareSlug(request()->input('slug'), request()->input('name')),
        ]);
    }

    public function rules(Model $item): array
    {
        return [
            'name' => 'required|string|min:2|max:20',
            'slug' => [
                'nullable',
                'string',
                'alpha_dash:ascii',
                'min:2',
                'max:30',
                Rule::unique('tags', 'slug')->ignore($this->getItemID()),
            ],
            //'class' => 'nullable|string|regex:/^.+@.+$/i',
        ];
    }
}

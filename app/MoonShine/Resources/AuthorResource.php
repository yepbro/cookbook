<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\MoonshineUser;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Fields\ID;
use MoonShine\Resources\ModelResource;

/**
 * @extends ModelResource<User>
 */
class AuthorResource extends ModelResource
{
    protected string $model = MoonshineUser::class;

    protected string $title = 'Авторы';

    protected string $column = 'name';

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

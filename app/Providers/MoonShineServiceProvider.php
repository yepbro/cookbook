<?php

declare(strict_types=1);

namespace App\Providers;

use App\MoonShine\Resources\ArticleResource;
use App\MoonShine\Resources\PageResource;
use App\MoonShine\Resources\TagResource;
use App\MoonShine\Resources\UserResource;
use MoonShine\Menu\MenuGroup;
use MoonShine\Menu\MenuItem;
use MoonShine\Providers\MoonShineApplicationServiceProvider;
use MoonShine\Resources\MoonShineUserResource;
use MoonShine\Resources\MoonShineUserRoleResource;

class MoonShineServiceProvider extends MoonShineApplicationServiceProvider
{
    protected function resources(): array
    {
        return [];
    }

    protected function pages(): array
    {
        return [];
    }

    protected function menu(): array
    {
        return [
            MenuItem::make(
                'Статьи',
                new ArticleResource
            )->icon('heroicons.document-duplicate'),

            MenuItem::make(
                'Страницы',
                new PageResource
            )->icon('heroicons.document'),

            MenuItem::make(
                'Теги',
                new TagResource
            )->icon('heroicons.tag'),

            MenuItem::make(
                'Пользователи',
                new UserResource
            )->icon('heroicons.users'),

            MenuGroup::make(static fn () => __('moonshine::ui.resource.system'), [

                MenuItem::make(
                    __('moonshine::ui.resource.admins_title'),
                    new MoonShineUserResource
                ),

                MenuItem::make(
                    __('moonshine::ui.resource.role_title'),
                    new MoonShineUserRoleResource
                ),

            ])->icon('heroicons.cog-8-tooth'),

        ];
    }

    /**
     * @return array{css: string, colors: array, darkColors: array}
     */
    protected function theme(): array
    {
        return [];
    }
}

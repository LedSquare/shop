<?php

declare(strict_types=1);

namespace App\Providers;

use App\MoonShine\Resources\Catalog\CatalogResource;
use Closure;
use MoonShine\Contracts\Resources\ResourceContract;
use MoonShine\Menu\MenuElement;
use MoonShine\Menu\MenuGroup;
use MoonShine\Menu\MenuItem;
use MoonShine\MoonShine;
use MoonShine\Pages\Page;
use MoonShine\Providers\MoonShineApplicationServiceProvider;
use MoonShine\Resources\MoonShineUserResource;
use MoonShine\Resources\MoonShineUserRoleResource;

class MoonShineServiceProvider extends MoonShineApplicationServiceProvider
{
    /**
     * @return list<ResourceContract>
     */
    protected function resources(): array
    {
        return [];
    }

    /**
     * @return list<Page>
     */
    protected function pages(): array
    {
        return [];
    }

    /**
     * @return Closure|list<MenuElement>
     */
    protected function menu(): array
    {
        return [
            MenuGroup::make(label: static fn(): array|string|null => __(key: 'moonshine::ui.resource.system'), items: [
                MenuItem::make(
                    label: static fn(): array|string|null => __(key: 'moonshine::ui.resource.admins_title'),
                    filler: new MoonShineUserResource()
                ),
                MenuItem::make(
                    label: static fn(): array|string|null => __(key: 'moonshine::ui.resource.role_title'),
                    filler: new MoonShineUserRoleResource()
                ),
            ]),

            MenuGroup::make(label: 'Каталог и Продукция', items: [
                MenuItem::make(label: 'Каталога', filler: new CatalogResource()),
            ])
        ];
    }

    /**
     * @return Closure|array{css: string, colors: array, darkColors: array}
     */
    protected function theme(): array
    {
        return [];
    }
}
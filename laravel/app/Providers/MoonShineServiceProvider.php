<?php

declare(strict_types=1);

namespace App\Providers;

use App\MoonShine\Resources\Blog\Category\ArticleResource;
use App\MoonShine\Resources\Catalog\CatalogResource;
use App\MoonShine\Resources\Catalog\Product\OptionResource;
use App\MoonShine\Resources\Catalog\Product\ProductResource;
use App\MoonShine\Resources\Catalog\Product\TypeResource;
use App\MoonShine\Resources\LocalizationResource;
use App\MoonShine\Resources\Localization\LangResource;
use MoonShine\Contracts\Resources\ResourceContract;
use MoonShine\Menu\MenuElement;
use MoonShine\Menu\MenuGroup;
use MoonShine\Menu\MenuItem;
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
        return [
            new LocalizationResource,
            new OptionResource,
        ];
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
                    filler: new MoonShineUserResource
                ),
                MenuItem::make(
                    label: static fn(): array|string|null => __(key: 'moonshine::ui.resource.role_title'),
                    filler: new MoonShineUserRoleResource
                ),
            ]),

            MenuGroup::make(label: 'Каталог и Продукция', items: [
                MenuItem::make(label: 'Каталог', filler: new CatalogResource),
                MenuItem::make(label: 'Тип стейка', filler: new TypeResource),
                MenuItem::make(label: 'Продукция', filler: new ProductResource),
            ]),

            MenuGroup::make(label: 'Блог', items: [
            ]),


            MenuItem::make(label: 'Языки', filler: new LangResource),
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

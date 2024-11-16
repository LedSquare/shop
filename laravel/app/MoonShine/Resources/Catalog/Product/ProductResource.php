<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Catalog\Product;

use App\Models\Catalog\Product\Product;
use App\MoonShine\Resources\Catalog\CatalogResource;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Decorations\Block;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Fields\Field;
use MoonShine\Fields\ID;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Text;
use MoonShine\Fields\TinyMce;
use MoonShine\Resources\ModelResource;

/**
 * @extends ModelResource<Product>
 */
class ProductResource extends ModelResource
{
    protected string $model = Product::class;

    protected string $title = 'Продукт';

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {

        return [
            ID::make('id')->sortable(),

            Tabs::make([
                Tab::make('Основная информация', [
                    Block::make([
                        BelongsTo::make(
                            label: 'Категория каталога',
                            relationName: 'catalog',
                            formatted: fn($catalog) => $catalog->name,
                            resource: new CatalogResource
                        ),
                        BelongsTo::make(
                            label: 'Тип стейка',
                            relationName: 'type',
                            formatted: fn($type) => $type->name,
                            resource: new CatalogResource
                        )->nullable(true)
                            ->default(null),

                        Text::make('Наименование', 'name'),
                        Text::make('Полное наименование', 'full_name'),
                        Switcher::make('Опубликован', 'publish'),
                        Text::make('Цена', 'price'),
                    ]),
                ]),
                Tab::make('Описание', [
                    TinyMce::make(column: 'description')
                        ->plugins('resize')
                        ->required()
                        ->hideOnIndex(),
                ])
            ])
        ];
    }

    /**
     * @param  Product  $item
     * @return array<string, string[]|string>
     *
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [
            'name' => ['required']
        ];
    }
}

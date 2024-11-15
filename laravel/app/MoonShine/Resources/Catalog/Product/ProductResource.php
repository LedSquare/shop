<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Catalog;

use App\Models\Catalog\Product\Product;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Decorations\Block;
use MoonShine\Fields\Field;
use MoonShine\Fields\ID;
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
            Block::make([
                ID::make('id')->sortable(),
            ]),
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
        return [];
    }
}

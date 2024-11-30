<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Catalog\Product;

use App\Models\Catalog\Product\Option;
use App\MoonShine\Resources\Catalog\Product\ProductResource;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Field;
use MoonShine\Fields\ID;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;

/**
 * @extends ModelResource<Option>
 */
class OptionResource extends ModelResource
{
    protected string $model = Option::class;

    protected string $title = 'Опция';

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {

        return [
            ID::make('id')->sortable(),
            Text::make('Наименование', 'name'),
            BelongsTo::make('Продукт_id', 'product', resource: new ProductResource),
        ];
    }

    /**
     * @param  Option  $item
     * @return array<string, string[]|string>
     *
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [
        ];
    }
}

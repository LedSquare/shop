<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Catalog\Product;

use App\Models\Catalog\Product\Type;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Decorations\Block;
use MoonShine\Fields\Field;
use MoonShine\Fields\ID;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;

/**
 * @extends ModelResource<Type>
 */
class TypeResource extends ModelResource
{
    protected string $model = Type::class;

    protected string $title = 'Типы стейка';

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {

        return [
            Block::make([
                ID::make('id')->sortable(),
                Text::make('Наименование', 'name'),
            ])
        ];
    }

    /**
     * @param  Type  $item
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

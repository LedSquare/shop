<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Catalog;

use App\Models\Catalog\Catalog;
use Illuminate\Database\Eloquent\Model;

use MoonShine\Components\MoonShineComponent;
use MoonShine\Decorations\Block;
use MoonShine\Fields\Field;
use MoonShine\Fields\ID;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;

/**
 * @extends ModelResource<Catalog>
 */
class CatalogResource extends ModelResource
{
    protected string $model = Catalog::class;

    protected string $title = 'Каталог';

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make(labelOrFields: [
                ID::make(column: 'id')->sortable(),
                Text::make(label: 'Заголовок_ru', column: 'title_ru'),
                Text::make(label: 'Заголовок_en', column: 'title_en'),
            ]),
        ];
    }

    /**
     * @param Catalog $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}

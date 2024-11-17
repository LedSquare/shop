<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Catalog;

use App\Models\Catalog\Catalog;
use App\MoonShine\Resources\LocalizationResource;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Decorations\Block;
use MoonShine\Fields\Field;
use MoonShine\Fields\ID;
use MoonShine\Fields\Relationships\MorphMany;
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
            Block::make([
                ID::make('id')->sortable(),
                Text::make('Название', 'name'),
                MorphMany::make('Переводы', 'localization', resource: new LocalizationResource(Catalog::getTransaledField()))
                    ->creatable()
                    ->searchable(false),
            ]),
        ];
    }

    public function indexFields(): array
    {
        return [
            ID::make('id')->sortable(),
            Text::make('Название', 'name'),
            MorphMany::make('Переводы', 'localization', resource: new LocalizationResource(Catalog::getTransaledField()))
                ->onlyLink('localizationable')
        ];
    }

    /**
     * @param  Catalog  $item
     * @return array<string, string[]|string>
     *
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }

    public function getActiveActions(): array
    {
        return [
            'update',
            'view',
        ];
    }
}

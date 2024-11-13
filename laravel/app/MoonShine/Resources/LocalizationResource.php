<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Catalog\Catalog;
use App\Models\Localization\Localization;

use App\MoonShine\Resources\Localization\LangResource;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Decorations\Block;
use MoonShine\Fields\Field;
use MoonShine\Fields\ID;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Relationships\MorphTo;
use MoonShine\Fields\Select;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;

/**
 * @extends ModelResource<Localization>
 */
class LocalizationResource extends ModelResource
{

    public function __construct(
        private ?string $catalogField = null
    ) {
    }
    protected string $model = Localization::class;

    protected string $title = 'Localizations';

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('Поле', 'field')
                    ->readonly()
                    ->default('asd'),
                Text::make('Перевод', 'translate'),
                BelongsTo::make('Язык', 'lang', fn($lang) => $lang->title, resource: new LangResource()),
                MorphTo::make('Переденные модели', 'localizationable')->types([
                    Catalog::class => 'field',
                ]),
            ]),
        ];
    }

    /**
     * @param Localization $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}

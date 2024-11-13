<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Localization;

use App\Models\Localization\Lang;
use Illuminate\Database\Eloquent\Model;

use MoonShine\Components\MoonShineComponent;
use MoonShine\Decorations\Block;
use MoonShine\Fields\Field;
use MoonShine\Fields\ID;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;

/**
 * @extends ModelResource<Lang>
 */
class LangResource extends ModelResource
{
    protected string $model = Lang::class;

    protected string $title = 'Langs';

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('Название', 'title'),
            ]),
        ];
    }

    /**
     * @param Lang $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}

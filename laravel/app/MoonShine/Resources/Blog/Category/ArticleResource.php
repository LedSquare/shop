<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Blog\Category;

use App\Models\Blog\Category\AbstractArticle;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Decorations\Block;
use MoonShine\Fields\Field;
use MoonShine\Resources\ModelResource;

/**
 * @extends ModelResource<AbstractArticle>
 */
class ArticleResource extends ModelResource
{
    protected string $model = AbstractArticle::class;

    protected string $title = 'Статья';


    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([

            ]),
        ];
    }

    /**
     * @param  AbstractArticle  $item
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
        ];
    }
}

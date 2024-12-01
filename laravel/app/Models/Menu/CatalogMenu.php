<?php

namespace App\Models\Menu;

use App\Traits\Localization\HasTranslate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $name
 * @property string $url
 */
class CatalogMenu extends Model
{
    /** @use HasFactory<\Database\Factories\Menu\MenuFactory> */
    use HasFactory;
    use HasTranslate;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'url',
        'order',
    ];

    protected $casts = [
        'name' => 'string',
        'url' => 'string',
        'order' => 'integer',
    ];

    public static function getTransaledField(): array
    {
        return [
            'name' => 'Название',
        ];
    }
}

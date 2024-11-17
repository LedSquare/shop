<?php

namespace App\Models\Menu;

use App\Traits\Localization\HasTranslate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $name
 * @property string $url
 */
class Menu extends Model
{
    /** @use HasFactory<\Database\Factories\Menu\MenuFactory> */
    use HasFactory;
    use HasTranslate;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'url',
    ];

    protected $casts = [
        'name' => 'string',
        'url' => 'string',
    ];

    public static function getTransaledField(): array
    {
        return [
            'name' => 'Название',
        ];
    }
}

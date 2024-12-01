<?php

namespace App\Models\Pages;

use App\Traits\Localization\HasTranslate;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property string $title
 * @property string $description
 * @property string $keywords
 */
class About extends AbstractPage
{
    /** @use HasFactory<\Database\Factories\Pages\AboutFactory> */
    use HasFactory;
    use HasTranslate;

    public $timestamps = false;

    public static function getTransaledField(): array
    {
        return [
            'title',
            'description',
        ];
    }
}

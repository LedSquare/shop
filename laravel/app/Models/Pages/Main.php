<?php

namespace App\Models\Pages;

use App\Traits\Localization\HasTranslate;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Main extends AbstractPage
{
    /** @use HasFactory<\Database\Factories\Pages\MainFactory> */
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

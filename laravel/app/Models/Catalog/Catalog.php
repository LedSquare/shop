<?php

namespace App\Models\Catalog;

use App\Traits\Localization\HasTranslate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    /** @use HasFactory<\Database\Factories\Catalog\CatalogFactory> */
    use HasFactory;

    use HasTranslate;

    public $timestamps = false;

    protected $table = 'catalogs';

    protected $fillable = [
        'title',
    ];

    protected $casts = [
        'title' => 'string',
    ];

    public static function getTransaledField(): array
    {
        return [
            'title' => 'Заголовок',
        ];
    }
}

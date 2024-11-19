<?php

namespace App\Models\Pages;

use App\Traits\Localization\HasTranslate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    /** @use HasFactory<\Database\Factories\Pages\AboutFactory> */
    use HasFactory;
    use HasTranslate;

    public $timestamps = false;

    protected $fillable = [
        'title',
        'text',
    ];

    protected $casts = [
        'title' => 'string',
        'text' => 'string',
    ];

    public static function getTransaledField(): array
    {
        return [
            'title',
            'text',
        ];
    }
}

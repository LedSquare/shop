<?php

namespace App\Models\Localization;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lang extends Model
{
    /** @use HasFactory<\Database\Factories\Localization\LangFactory> */
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title',
    ];

    protected $casts = [
        'title' => 'string',
    ];

    public function localizations(): HasMany
    {
        return $this->hasMany(Localization::class, 'lang_id');
    }
}

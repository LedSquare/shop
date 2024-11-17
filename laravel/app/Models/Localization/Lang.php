<?php

namespace App\Models\Localization;

use App\Models\Localization\Localization;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property string $title
 * @property \Illuminate\Database\Eloquent\Collection<Localization> $localizations
 *
 * @method HasMany localizations()
 */
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

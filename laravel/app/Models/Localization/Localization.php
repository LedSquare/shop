<?php

namespace App\Models\Localization;

use App\Models\Localization\Lang;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;


/**
 * @property int $localizationable_id
 * @property string $localizationable_type
 * @property int $lang_id
 * @property string $field
 * @property string $translate
 *
 * @property Lang $lang
 * @property Lang $lang
 * @method BelongsTo lang()
 * @method MorphTo localizationable()
 */
class Localization extends Model
{
    /** @use HasFactory<\Database\Factories\Localization\LocalizationFactory> */
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'localizationable_id',
        'localizationable_type',
        'lang_id',
        'field',
        'translate',
    ];

    protected $casts = [
        'model_id' => 'integer',
        'model_type' => 'string',
        'lang_id' => 'integer',
        'field' => 'string',
        'translate' => 'string',
    ];

    public function lang(): BelongsTo
    {
        return $this->belongsTo(Lang::class, 'lang_id');
    }

    public function localizationable(): MorphTo
    {
        return $this->morphTo();
    }
}

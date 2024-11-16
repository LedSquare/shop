<?php

namespace App\Traits\Localization;

use App\Models\Localization\Lang;
use App\Models\Localization\Localization;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * @template T of Model
 */
trait HasTranslate
{
    abstract public static function getTransaledField(): array; //Переводимые поля

    public function translate($field, $lang = null)
    {
        if ($lang === null) {
            $lang = app()->getLocale();
        }

        if ($lang == 'ru') {
            return $this->$field;
        }

        $translate = $this->localization()
            ->where(
                'lang_id',
                Lang::where('title', $lang)
                    ->first()->id
            )
            ->where('field', $field)->first();

        if (!$translate) {
            return $this->$field;
        }

        return $translate;
    }

    public function localization(): MorphMany
    {
        /** @var T $this */
        return $this->morphMany(Localization::class, 'localizationable');
    }
}

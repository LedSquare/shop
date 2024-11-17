<?php

namespace App\Models\Catalog;

use App\Models\Catalog\Product\Product;
use App\Traits\Localization\HasTranslate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property string $name
 */
class Catalog extends Model
{
    /** @use HasFactory<\Database\Factories\Catalog\CatalogFactory> */
    use HasFactory;

    use HasTranslate;

    public $timestamps = false;

    protected $table = 'catalogs';

    protected $fillable = [
        'name',
    ];

    protected $casts = [
        'name' => 'string',
    ];

    public static function getTransaledField(): array
    {
        return [
            'name' => 'Название',
        ];
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'catalog_id');
    }
}

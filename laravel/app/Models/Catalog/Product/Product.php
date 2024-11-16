<?php

namespace App\Models\Catalog\Product;

use App\Models\Catalog\Catalog;
use App\Models\Catalog\Product\Brand\Brand;
use App\Models\Catalog\Product\Type;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $catalog_id
 * @property int $brand_id
 * @property string $name
 * @property string $full_name
 * @property string $description
 * @property bool $publish
 * @property int $price
 */
class Product extends Model
{
    /** @use HasFactory<\Database\Factories\Catalog\Product\ProductFactory> */
    use HasFactory;

    public $timestamps = false;

    protected $table = 'products';

    protected $fillable = [
        'catalog_id',
        'brand_id',
        'name',
        'full_name',
        'description',
        'publish',
        'price',
    ];

    protected $casts = [
        'catalog_id' => 'integer',
        'brand_id' => 'integer',
        'name' => 'string',
        'full_name' => 'string',
        'description' => 'string', //text
        'publish' => 'boolean',
        'price' => 'integer',
    ];

    public function catalog(): BelongsTo
    {
        return $this->belongsTo(Catalog::class, 'catalog_id');
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class, 'type_id');
    }


}

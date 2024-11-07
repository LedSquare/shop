<?php

namespace App\Models\Catalog\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $cut_id
 * @property int $brand_id
 * @property string $name
 * @property string $full_name
 * @property string $description
 * @property int $price
 */
class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'catalog_id',
        'brand_id',
        'name',
        'full_name',
        'description',
        'visible',
        'price',
    ];

    protected $casts = [
        'catalog_id' => 'integer',
        'brand_id' => 'integer',
        'name' => 'string',
        'full_name' => 'text',
        'description' => 'string',
        'visible' => 'boolean',
        'price' => 'integer',
    ];
}

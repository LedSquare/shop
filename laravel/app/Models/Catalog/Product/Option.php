<?php

namespace App\Models\Catalog\Product;

use App\Models\Catalog\Product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Option extends Model
{
    /** @use HasFactory<\Database\Factories\Catalog\Product\OptionFactory> */
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'product_id'
    ];

    protected $casts = [
        'name' => 'string',
        'product_id' => 'integer',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}

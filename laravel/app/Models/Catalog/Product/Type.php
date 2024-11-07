<?php

namespace App\Models\Catalog\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Type extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'fullaname'
    ];


    protected $casts = [
        'name' => 'string',
        'fullname' => 'string',
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(
            related: Product::class,
            table: TypeProcuct::class,
            foreignPivotKey: 'type_id',
            relatedPivotKey: 'product_id'
        );
    }
}

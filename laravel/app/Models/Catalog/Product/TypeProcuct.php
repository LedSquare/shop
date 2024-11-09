<?php

namespace App\Models\Catalog\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeProcuct extends Model
{
    use HasFactory;

    protected $table = 'type_products';

    public $timestamps = false;

    protected $fillable = [
        'type_id',
        'product_id',
    ];


}

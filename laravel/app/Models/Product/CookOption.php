<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CookOption extends Model
{
    use HasFactory;

    protected $table = 'cook_options';

    protected $fillable = [
        'title',
        'discription',
    ];
}

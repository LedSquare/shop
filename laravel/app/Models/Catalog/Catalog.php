<?php

namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'catalogs';

    protected $fillable = [
        'title_ru',
        'title_en',
    ];

    protected $casts = [
        'title_ru' => 'string',
        'title_en' => 'string',
    ];
}

<?php

namespace App\Models\Blog\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractArticle extends Model
{
    protected $fillable = [
        'title',
        'text',
        'preview_image',
        'publish',
    ];

    protected $casts = [
        'title' => 'string',
        'text' => 'string',
        'preview_image' => 'string',
        'publish' => 'boolean',
    ];

}

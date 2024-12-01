<?php

namespace App\Models\Blog\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends AbstractArticle
{
    /** @use HasFactory<\Database\Factories\Blog\NewsFactory> */
    use HasFactory;
}

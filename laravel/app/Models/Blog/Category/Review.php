<?php

namespace App\Models\Blog\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends AbstractArticle
{
    /** @use HasFactory<\Database\Factories\Blog\Category\ReviewFactory> */
    use HasFactory;
}

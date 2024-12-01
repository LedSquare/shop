<?php

namespace App\Models\Blog\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends AbstractArticle
{
    /** @use HasFactory<\Database\Factories\Blog\Category\VideoFactory> */
    use HasFactory;
}

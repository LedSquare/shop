<?php

namespace App\Models\Blog\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property string $title
 * @property string $text
 * @property string $preview_image
 * @property bool $publish
 */
class Article extends Model
{
    /** @use HasFactory<\Database\Factories\Blog\ArticleFactory> */
    use HasFactory;

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

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany();
    }

}

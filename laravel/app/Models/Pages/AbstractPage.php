<?php

namespace App\Models\Pages;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractPage extends Model
{
    protected $fillable = [
        'title',
        'description',
        'keywords',
    ];

    protected $casts = [
        'title' => 'string',
        'description' => 'string',
        'keywords' => 'string',
    ];
}

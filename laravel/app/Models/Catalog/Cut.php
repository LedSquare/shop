<?php

namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cut extends Model
{
    use HasFactory;

    protected $table = 'cuts';

    protected $fillable = [
        'name',
    ];
}

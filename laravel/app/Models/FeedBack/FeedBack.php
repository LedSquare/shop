<?php

namespace App\Models\FeedBack;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedBack extends Model
{
    use HasFactory;

    protected $table = 'feedbacks';

    protected $fillable = [
        'contact_info',
        'type',
    ];
}

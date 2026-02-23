<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CsrProject extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'summary',
        'content',
        'image_path',
        'location',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];
}

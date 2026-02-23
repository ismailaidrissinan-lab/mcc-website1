<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvestorDocument extends Model
{
    protected $fillable = [
        'title',
        'category',
        'file_path',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];
}

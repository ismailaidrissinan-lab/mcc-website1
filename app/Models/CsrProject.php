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
    public function getImageUrlAttribute()
    {
        if (!$this->image_path) {
            return '/images/mcc-logo.png';
        }

        if (filter_var($this->image_path, FILTER_VALIDATE_URL)) {
            if (strpos($this->image_path, 'unsplash') !== false) {
                return '/images/mcc-logo.png';
            }
            return $this->image_path;
        }

        return url('system-assets').'/'.($this->image_path);
    }
}

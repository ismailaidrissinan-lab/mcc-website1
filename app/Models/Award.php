<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    protected $fillable = ['title', 'description', 'year', 'image_path', 'type'];

    public function getImageUrlAttribute()
    {
        if (!$this->image_path) {
            return asset('images/mcc-logo.png');
        }

        if (filter_var($this->image_path, FILTER_VALIDATE_URL)) {
            if (strpos($this->image_path, 'unsplash') !== false) {
                return asset('images/mcc-logo.png');
            }
            return $this->image_path;
        }

        return asset('storage/' . ltrim($this->image_path, '/'));
    }
}

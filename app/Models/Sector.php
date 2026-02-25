<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'image_path'];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function getImageUrlAttribute()
    {
        if (!$this->image_path) {
            return '/images/default-sector.png';
        }

        if (filter_var($this->image_path, FILTER_VALIDATE_URL)) {
            if (strpos($this->image_path, 'unsplash') !== false) {
                return '/images/default-sector.png';
            }
            return $this->image_path;
        }

        return url('system-assets').'/'.($this->image_path);
    }
}

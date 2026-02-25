<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainingProgram extends Model
{
    protected $fillable = ['title', 'location', 'description', 'image_path'];

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

        return \Illuminate\Support\Facades\Storage::url($this->image_path);
    }
}

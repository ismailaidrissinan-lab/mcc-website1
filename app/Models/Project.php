<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'sector_id',
        'state_id',
        'title',
        'slug',
        'location',
        'description',
        'content',
        'status',
        'completion_date',
        'award_date',
        'image_path'
    ];

    protected $casts = [
        'completion_date' => 'datetime',
        'award_date' => 'datetime',
    ];

    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function images()
    {
        return $this->hasMany(ProjectImage::class);
    }

    public function mainImage()
    {
        return $this->hasOne(ProjectImage::class)->orderBy('id');
    }

    public function getImageUrlAttribute()
    {
        $path = $this->image_path;

        // Fallback to mainImage if image_path is empty
        if (!$path && $this->mainImage) {
            $path = $this->mainImage->image_path;
        }

        if (!$path) {
            if ($this->sector) {
                return $this->sector->image_url;
            }
            return asset('images/mcc-logo.png');
        }

        if (filter_var($path, FILTER_VALIDATE_URL)) {
            return $path;
        }

        return asset('storage/' . ltrim($path, '/'));
    }
}

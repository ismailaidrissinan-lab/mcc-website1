<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'sector_id', 'title', 'slug', 'location', 'description', 
        'content', 'status', 'completion_date', 'image_path'
    ];

    protected $casts = [
        'completion_date' => 'datetime',
    ];

    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }

    public function images()
    {
        return $this->hasMany(ProjectImage::class);
    }

    public function mainImage()
    {
        return $this->hasOne(ProjectImage::class)->orderBy('id');
    }
}
